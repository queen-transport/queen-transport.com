<?php

use App\Models\Armada;

test('sewa mobil expander ultimate page renders successfully via folio', function () {
    $response = $this->get(route('sewa-mobil-expander-ultimate'));

    $response->assertOk();
    $response->assertSee('Sewa Mobil');
    $response->assertSee('Expander Ultimate');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));
});

test('sewa mobil expander ultimate page displays armadas from database', function () {
    Armada::factory()->create([
        'title' => 'Mitsubishi Xpander Ultimate 2024',
        'car_type' => '7 Seat MPV',
        'price' => 1100000,
        'is_published' => true,
    ]);

    $response = $this->get(route('sewa-mobil-expander-ultimate'));

    $response->assertOk();
    $response->assertSee('Mitsubishi Xpander Ultimate 2024');
});

test('sitemap includes sewa mobil expander ultimate url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('sewa-mobil-expander-ultimate'), false);
});
