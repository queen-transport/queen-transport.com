<?php

use App\Models\Armada;
use App\Models\Pelanggan;

test('sewa mobil mewah surabaya page renders successfully via folio', function () {
    $response = $this->get(route('sewa-mobil-mewah-surabaya'));

    $response->assertOk();
    $response->assertSee('Sewa Mobil Mewah');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));
});

test('sewa mobil mewah surabaya page displays luxury armadas when present', function () {
    Armada::factory()->create([
        'title' => 'Toyota Alphard Transformer Executive',
        'car_type' => 'Alphard',
        'price' => 2800000,
        'is_published' => true,
    ]);

    $response = $this->get(route('sewa-mobil-mewah-surabaya'));

    $response->assertOk();
    $response->assertSee('Toyota Alphard Transformer Executive');
});

test('sitemap includes sewa mobil mewah surabaya url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('sewa-mobil-mewah-surabaya'), false);
});
