<?php

use App\Contracts\ReviewServiceInterface;
use App\Livewire\Reviews\CreateReview;
use App\Models\Armada;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

test('guests are redirected to login when visiting review create page', function () {
    $response = $this->get(route('reviews.create'));

    $response->assertRedirect(route('login'));
});

test('authenticated user can view review create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('reviews.create'));

    $response->assertOk()
        ->assertSeeLivewire(CreateReview::class)
        ->assertSee('Tulis Ulasan &amp; Pengalaman Sewa', false);
});

test('passing armada query param pre-selects armada automatically', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create(['title' => 'Toyota Alphard Luxury']);

    $this->actingAs($user);

    Livewire::withQueryParams(['armada' => $armada->id])
        ->test(CreateReview::class)
        ->assertSet('selectedArmadas', [$armada->id])
        ->assertSee('Toyota Alphard Luxury Otomatis Terpilih');
});

test('passing armada slug query param pre-selects armada automatically', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create(['title' => 'Hiace Premio 2024', 'slug' => 'hiace-premio-2024']);

    $this->actingAs($user);

    Livewire::withQueryParams(['armada' => 'hiace-premio-2024'])
        ->test(CreateReview::class)
        ->assertSet('selectedArmadas', [$armada->id]);
});

test('user can select and toggle other armadas', function () {
    $user = User::factory()->create();
    $armada1 = Armada::factory()->create();
    $armada2 = Armada::factory()->create();

    $this->actingAs($user);

    Livewire::withQueryParams(['armada' => $armada1->id])
        ->test(CreateReview::class)
        ->assertSet('selectedArmadas', [$armada1->id])
        ->call('toggleArmada', $armada2->id)
        ->assertSet('selectedArmadas', [$armada1->id, $armada2->id])
        ->call('toggleArmada', $armada1->id)
        ->assertSet('selectedArmadas', [$armada2->id]);
});

test('user can successfully submit review and is redirected to dashboard', function () {
    $user = User::factory()->create();
    $armada = Armada::factory()->create();

    $this->actingAs($user);

    Livewire::withQueryParams(['armada' => $armada->id])
        ->test(CreateReview::class)
        ->set('rating', 5)
        ->set('carReview', 'Kondisi Alphard mulus, kabin higienis dan wangi.')
        ->set('driverReview', 'Driver Pak Joko sangat ramah dan sopan.')
        ->set('facilitiesReview', 'AC dingin, air mineral dan charger tersedia.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('feedbackMessage', 'Ulasan berhasil dikirim! Menunggu persetujuan admin untuk ditayangkan.')
        ->assertSessionHas('feedbackType', 'success');

    $review = Review::where('user_id', $user->id)->first();
    expect($review)->not->toBeNull()
        ->and($review->rating)->toBe(5)
        ->and($review->car_review)->toBe('Kondisi Alphard mulus, kabin higienis dan wangi.')
        ->and($review->driver_review)->toBe('Driver Pak Joko sangat ramah dan sopan.')
        ->and($review->facilities_review)->toBe('AC dingin, air mineral dan charger tersedia.')
        ->and($review->status)->toBe(Review::STATUS_PENDING)
        ->and($review->armadas)->toHaveCount(1)
        ->and($review->armadas->first()->id)->toBe($armada->id);
});

test('review create form displays detail review sections for car, driver, and facilities', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(CreateReview::class)
        ->assertSee('Tentang Mobil')
        ->assertSee('Tentang Driver')
        ->assertSee('Kualitas &amp; Fasilitas', false);
});

test('validation prevents submitting invalid reviews and dispatches scroll-to-status event', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(CreateReview::class)
        ->set('rating', 0)
        ->set('carReview', 'abc') // < 5 chars
        ->set('driverReview', '') // required
        ->set('facilitiesReview', '') // required
        ->call('submit')
        ->assertHasErrors(['rating', 'carReview', 'driverReview', 'facilitiesReview'])
        ->assertDispatched('scroll-to-status')
        ->assertSee('review-validation-alert')
        ->assertSee('Terdapat kesalahan pada formulir ulasan');
});

test('server failure dispatches scroll-to-status event and displays status alert', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $mockService = Mockery::mock(ReviewServiceInterface::class);
    $mockService->shouldReceive('createReview')->andThrow(new RuntimeException('Koneksi database bermasalah'));
    $this->app->instance(ReviewServiceInterface::class, $mockService);

    Livewire::test(CreateReview::class)
        ->set('rating', 5)
        ->set('carReview', 'Mobil sangat bagus dan nyaman')
        ->set('driverReview', 'Driver sangat profesional')
        ->set('facilitiesReview', 'Fasilitas sangat memuaskan')
        ->call('submit')
        ->assertDispatched('scroll-to-status')
        ->assertSee('review-status-alert')
        ->assertSee('Terjadi kesalahan saat menyimpan ulasan: Koneksi database bermasalah');
});

test('user can upload photos and videos with review', function () {
    Storage::fake('public');
    $user = User::factory()->create();
    $armada = Armada::factory()->create();

    $this->actingAs($user);

    $photo = UploadedFile::fake()->image('test-car.jpg', 600, 400);

    Livewire::withQueryParams(['armada' => $armada->id])
        ->test(CreateReview::class)
        ->set('rating', 4)
        ->set('carReview', 'Perjalanan dinas lancar sekali dan armada nyaman.')
        ->set('driverReview', 'Driver selalu mengutamakan keselamatan.')
        ->set('facilitiesReview', 'Fasilitas lengkap dan bersih.')
        ->set('photos', [$photo])
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard'));

    $review = Review::where('user_id', $user->id)->first();
    expect($review->getMedia('photos'))->toHaveCount(1);
});

test('armada photo is displayed when available in review form', function () {
    $user = User::factory()->create();
    $armadaWithPhoto = Armada::factory()->create([
        'title' => 'Alphard Luxury Photo Test',
        'featured_image' => 'https://example.com/alphard.jpg',
    ]);
    $armadaWithoutPhoto = Armada::factory()->create([
        'title' => 'Innova Tanpa Foto Test',
        'featured_image' => null,
        'gallery' => [],
    ]);

    $this->actingAs($user);

    Livewire::test(CreateReview::class)
        ->assertSee('https://example.com/alphard.jpg')
        ->assertSee('Alphard Luxury Photo Test')
        ->assertSee('Innova Tanpa Foto Test')
        ->assertSee('Armada Queen');
});
