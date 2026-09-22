<?php

use App\Models\Armada;

test('rental mobil mewah jawa timur page renders successfully via folio', function () {
    $response = $this->get(route('rental-mobil-mewah-jawa-timur'));

    $response->assertOk();
    $response->assertSee('Rental Mobil Mewah');
    $response->assertSee('Jawa Timur');
    $response->assertSee('Toyota Alphard');
    $response->assertSee('Hiace Premio Luxury');
    $response->assertSee('Bandara Internasional Juanda');
    $response->assertSee(config('site.brand'));
});

test('rental mobil mewah jawa timur page renders armada list with correct image storage URL', function () {
    Armada::factory()->create([
        'title' => 'Toyota Alphard Jawa Timur VIP Test',
        'featured_image' => 'armadas/test-alphard-jatim.jpg',
        'is_published' => true,
    ]);

    $response = $this->get(route('rental-mobil-mewah-jawa-timur'));

    $response->assertOk();
    $response->assertSee('Toyota Alphard Jawa Timur VIP Test');
    $response->assertSee('storage/armadas/test-alphard-jatim.jpg');
});

test('sitemap includes rental mobil mewah jawa timur url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('rental-mobil-mewah-jawa-timur'), false);
});
