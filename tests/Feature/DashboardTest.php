<?php

use App\Livewire\Dashboard\ReviewManager;
use App\Models\Armada;
use App\Models\Review;
use App\Models\User;
use Livewire\Livewire;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard and see their reviews', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create(['title' => 'Toyota Alphard VIP']);

    $review = Review::factory()->create([
        'user_id' => $user->id,
        'car_review' => 'Unit bersih dan nyaman sekali.',
        'driver_review' => 'Driver ramah dan profesional.',
        'facilities_review' => 'Fasilitas sangat memuaskan.',
        'status' => Review::STATUS_APPROVED,
    ]);
    $review->armadas()->attach($armada);

    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk()
        ->assertSee('Toyota Alphard VIP')
        ->assertSee('Unit bersih dan nyaman sekali.');
});

test('livewire review manager can submit a new review', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create();

    $this->actingAs($user);

    Livewire::test(ReviewManager::class)
        ->call('openCreateModal')
        ->set('rating', 5)
        ->set('carReview', 'Kondisi mobil sangat prima dan wangi.')
        ->set('driverReview', 'Sopir sangat ramah dan tiba tepat waktu.')
        ->set('facilitiesReview', 'Fasilitas kabin lengkap dan nyaman.')
        ->set('selectedArmadas', [$armada->id])
        ->call('submitCreate')
        ->assertHasNoErrors()
        ->assertSet('showCreateModal', false);

    $review = Review::where('user_id', $user->id)->first();
    expect($review)->not->toBeNull();
    expect($review->car_review)->toBe('Kondisi mobil sangat prima dan wangi.');
    expect($review->status)->toBe(Review::STATUS_PENDING);
    expect($review->armadas)->toHaveCount(1);
});

test('livewire review manager allows edit within 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'car_review' => 'Komentar awal sebelum diedit',
        'driver_review' => 'Driver awal',
        'facilities_review' => 'Fasilitas awal',
        'created_at' => now()->subHours(6),
    ]);

    $this->actingAs($user);

    Livewire::test(ReviewManager::class)
        ->call('openEditModal', $review->id)
        ->set('carReview', 'Komentar baru setelah diedit')
        ->call('submitEdit')
        ->assertHasNoErrors()
        ->assertSet('showEditModal', false);

    $review->refresh();
    expect($review->car_review)->toBe('Komentar baru setelah diedit');
});

test('livewire review manager blocks edit after 24 hours', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'car_review' => 'Komentar lama terkunci',
        'driver_review' => 'Driver lama',
        'facilities_review' => 'Fasilitas lama',
        'created_at' => now()->subHours(26),
    ]);

    $this->actingAs($user);

    Livewire::test(ReviewManager::class)
        ->call('openEditModal', $review->id)
        ->assertSet('showEditModal', false)
        ->assertSet('feedbackType', 'error');

    $review->refresh();
    expect($review->car_review)->toBe('Komentar lama terkunci');
});

test('visiting dashboard with review_armada redirects to reviews.create', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create();

    $this->actingAs($user);

    Livewire::withQueryParams(['review_armada' => $armada->id])
        ->test(ReviewManager::class)
        ->assertRedirect(route('reviews.create', ['armada' => $armada->id]));
});

test('review manager edit modal displays armada photo when available', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create([
        'title' => 'Innova Zenix Hybrid Modal Test',
        'featured_image' => 'https://example.com/zenix.jpg',
    ]);
    $review = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subHours(2),
    ]);

    $this->actingAs($user);

    Livewire::test(ReviewManager::class)
        ->call('openEditModal', $review->id)
        ->assertSet('showEditModal', true)
        ->assertSee('https://example.com/zenix.jpg')
        ->assertSee('Innova Zenix Hybrid Modal Test');
});
