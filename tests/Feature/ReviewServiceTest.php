<?php

use App\Contracts\ReviewServiceInterface;
use App\Models\Armada;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
    Storage::fake('media');
    $this->reviewService = app(ReviewServiceInterface::class);
});

test('user can create review with pending status and optional armadas', function () {
    $user = User::factory()->create();
    $armada1 = Armada::factory()->create();
    $armada2 = Armada::factory()->create();

    $photo = UploadedFile::fake()->image('test-photo.jpg');
    $video = UploadedFile::fake()->create('test-video.mp4', 500, 'video/mp4');

    $review = $this->reviewService->createReview(
        $user,
        [
            'rating' => 5,
            'title' => 'Sangat Memuaskan',
            'comment' => 'Mobil sangat bersih dan driver ramah sekali.',
            'armada_ids' => [$armada1->id, $armada2->id],
        ],
        [$photo],
        [$video],
    );

    expect($review)->toBeInstanceOf(Review::class);
    expect($review->id)->toBeString();
    expect($review->user_id)->toBe($user->id);
    expect($review->rating)->toBe(5);
    expect($review->status)->toBe(Review::STATUS_PENDING);
    expect($review->armadas)->toHaveCount(2);
    expect($review->getMedia('photos'))->toHaveCount(1);
    expect($review->getMedia('videos'))->toHaveCount(1);
});

test('user can update own review within 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'rating' => 4,
        'comment' => 'Review awal',
        'created_at' => now()->subHours(5),
    ]);

    $updated = $this->reviewService->updateReview(
        $review,
        $user,
        [
            'rating' => 5,
            'comment' => 'Review setelah diedit',
        ]
    );

    expect($updated->rating)->toBe(5);
    expect($updated->comment)->toBe('Review setelah diedit');
});

test('user cannot update review after 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'rating' => 4,
        'comment' => 'Review lama',
        'created_at' => now()->subHours(25),
    ]);

    expect(fn () => $this->reviewService->updateReview(
        $review,
        $user,
        ['comment' => 'Coba edit review lama']
    ))->toThrow(AuthorizationException::class);
});

test('non-owner cannot update review', function () {
    $owner = User::factory()->create();
    $stranger = User::factory()->create();

    $review = Review::factory()->create([
        'user_id' => $owner->id,
        'created_at' => now()->subHour(),
    ]);

    expect(fn () => $this->reviewService->updateReview(
        $review,
        $stranger,
        ['comment' => 'Edit oleh orang lain']
    ))->toThrow(AuthorizationException::class);
});

test('user can delete own review within 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subHours(2),
    ]);

    $result = $this->reviewService->deleteReview($review, $user);

    expect($result)->toBeTrue();
    expect(Review::find($review->id))->toBeNull();
});

test('user cannot delete review after 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subHours(30),
    ]);

    expect(fn () => $this->reviewService->deleteReview($review, $user))
        ->toThrow(AuthorizationException::class);
});

test('admin can update and delete reviews even after 24 hours', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);
    $user = User::factory()->create();

    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subDays(5),
    ]);

    $updated = $this->reviewService->updateReview(
        $review,
        $admin,
        ['comment' => 'Diedit oleh admin setelah 5 hari']
    );

    expect($updated->comment)->toBe('Diedit oleh admin setelah 5 hari');

    $deleted = $this->reviewService->deleteReview($review, $admin);
    expect($deleted)->toBeTrue();
});

test('admin can approve and reject reviews', function () {
    $review = Review::factory()->pending()->create();

    $approved = $this->reviewService->approveReview($review);
    expect($approved->status)->toBe(Review::STATUS_APPROVED);

    $rejected = $this->reviewService->rejectReview($review);
    expect($rejected->status)->toBe(Review::STATUS_REJECTED);
});

test('admin can create review directly with custom status', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create();

    $review = $this->reviewService->adminCreateReview([
        'user_id' => $user->id,
        'rating' => 5,
        'title' => 'Testimoni Khusus',
        'comment' => 'Ulasan dimasukkan langsung oleh admin.',
        'armada_ids' => [$armada->id],
        'status' => Review::STATUS_APPROVED,
    ]);

    expect($review->created_by_admin)->toBeTrue();
    expect($review->status)->toBe(Review::STATUS_APPROVED);
    expect($review->armadas)->toHaveCount(1);
});
