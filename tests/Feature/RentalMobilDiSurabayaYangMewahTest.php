<?php

use App\Models\Armada;

test('rental mobil di surabaya yang mewah page renders successfully via folio', function () {
    $response = $this->get(route('rental-mobil-di-surabaya-yang-mewah'));

    $response->assertOk();
    $response->assertSee('Rental Mobil di Surabaya');
    $response->assertSee('yang Mewah');
    $response->assertSee(config('site.brand'));
});

test('rental mobil di surabaya yang mewah page displays luxury armadas when present', function () {
    Armada::factory()->create([
        'title' => 'Toyota Hiace Premio Luxury VIP',
        'car_type' => 'Hiace',
        'price' => 2000000,
        'is_published' => true,
    ]);

    $response = $this->get(route('rental-mobil-di-surabaya-yang-mewah'));

    $response->assertOk();
    $response->assertSee('Toyota Hiace Premio Luxury VIP');
});

test('sitemap includes rental mobil di surabaya yang mewah url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('rental-mobil-di-surabaya-yang-mewah'), false);
});
