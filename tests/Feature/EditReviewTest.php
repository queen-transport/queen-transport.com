<?php

use App\Livewire\Reviews\EditReview;
use App\Models\Armada;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    Storage::fake('public');
});

test('guests are redirected to the login page when accessing edit review page', function () {
    $review = Review::factory()->create();

    $response = $this->get(route('reviews.edit', $review));
    $response->assertRedirect(route('login'));
});

test('user cannot edit a review created by another user', function () {
    $owner = User::factory()->create();
    $otherUser = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $owner->id,
        'created_at' => now()->subHours(2),
    ]);

    $this->actingAs($otherUser);

    Livewire::test(EditReview::class, ['review' => $review])
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('feedbackType', 'error');
});

test('user cannot access edit review page after 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subHours(25),
    ]);

    $this->actingAs($user);

    Livewire::test(EditReview::class, ['review' => $review])
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('feedbackType', 'error');
});

test('user can visit standalone edit review page within 24 hours', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create(['title' => 'Innova Reborn Diesel']);
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'rating' => 4,
        'car_review' => 'Mobil bersih dan nyaman sekali.',
        'driver_review' => 'Driver ramah dan tepat waktu.',
        'facilities_review' => 'AC dingin dan air mineral tersedia.',
        'created_at' => now()->subHours(5),
    ]);
    $review->armadas()->attach($armada);

    $this->actingAs($user);

    $response = $this->get(route('reviews.edit', $review));
    $response->assertOk()
        ->assertSee('Edit Ulasan &amp; Pengalaman Sewa', false)
        ->assertSee('Innova Reborn Diesel')
        ->assertSee('Mobil bersih dan nyaman sekali.')
        ->assertSee('Driver ramah dan tepat waktu.')
        ->assertSee('AC dingin dan air mineral tersedia.');
});

test('user can successfully update review on standalone edit page', function () {
    $user = User::factory()->create();
    $armada1 = Armada::factory()->create(['title' => 'Alphard Transformer']);
    $armada2 = Armada::factory()->create(['title' => 'Hiace Premio Luxury']);

    $review = Review::factory()->create([
        'user_id' => $user->id,
        'rating' => 4,
        'car_review' => 'Ulasan mobil versi awal.',
        'driver_review' => 'Ulasan driver versi awal.',
        'facilities_review' => 'Ulasan fasilitas versi awal.',
        'created_at' => now()->subHours(2),
    ]);
    $review->armadas()->attach($armada1);

    $this->actingAs($user);

    Livewire::test(EditReview::class, ['review' => $review])
        ->assertSet('rating', 4)
        ->assertSet('carReview', 'Ulasan mobil versi awal.')
        ->assertSet('driverReview', 'Ulasan driver versi awal.')
        ->assertSet('facilitiesReview', 'Ulasan fasilitas versi awal.')
        ->set('rating', 5)
        ->set('carReview', 'Mobil sangat mewah dan suspensi luar biasa empuk.')
        ->set('driverReview', 'Driver sangat profesional, berpakaian rapi dan tepat waktu.')
        ->set('facilitiesReview', 'Fasilitas reclining seat dan audio premium sangat memuaskan.')
        ->call('toggleArmada', $armada2->id)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('feedbackType', 'success');

    $review->refresh();
    expect($review->rating)->toBe(5);
    expect($review->car_review)->toBe('Mobil sangat mewah dan suspensi luar biasa empuk.');
    expect($review->driver_review)->toBe('Driver sangat profesional, berpakaian rapi dan tepat waktu.');
    expect($review->facilities_review)->toBe('Fasilitas reclining seat dan audio premium sangat memuaskan.');
    expect($review->armadas->pluck('id')->all())->toContain($armada1->id, $armada2->id);
});

test('validation requires car_review, driver_review, and facilities_review on edit', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subHours(1),
    ]);

    $this->actingAs($user);

    Livewire::test(EditReview::class, ['review' => $review])
        ->set('carReview', '')
        ->set('driverReview', '')
        ->set('facilitiesReview', '')
        ->call('submit')
        ->assertHasErrors([
            'carReview' => 'required',
            'driverReview' => 'required',
            'facilitiesReview' => 'required',
        ]);
});

test('user can mark existing media for removal and upload new media on edit page', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subHours(1),
    ]);

    $existingPhoto = UploadedFile::fake()->image('old_photo.jpg');
    $media = $review->addMedia($existingPhoto)->toMediaCollection('photos');

    $this->actingAs($user);

    $newPhoto = UploadedFile::fake()->image('new_photo.jpg');

    Livewire::test(EditReview::class, ['review' => $review])
        ->call('markMediaForRemoval', $media->id)
        ->assertSet('removeMediaIds', [$media->id])
        ->set('photos', [$newPhoto])
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard'));

    $review->refresh();
    expect($review->getMedia('photos'))->toHaveCount(1);
    expect($review->getMedia('photos')->first()->id)->not->toBe($media->id);
});
