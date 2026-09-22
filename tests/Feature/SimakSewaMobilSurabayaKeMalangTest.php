<?php

use App\Models\Armada;

test('simak sewa mobil surabaya ke malang page renders successfully via folio', function () {
    $response = $this->get(route('simak-sewa-mobil-surabaya-ke-malang'));

    $response->assertOk();
    $response->assertSee('Simak Sewa Mobil Surabaya ke Malang');
    $response->assertSee('Drop Off, Carter PP &amp; Wisata Batu', false);
    $response->assertSee('1,5 – 2 jam', false);
    $response->assertSee('Tol Pandaan – Malang', false);
    $response->assertSee('Badan Pengatur Jalan Tol (BPJT)');
    $response->assertSee('dapat berubah sewaktu-waktu');
    $response->assertSee(config('site.brand'));
});

test('simak sewa mobil surabaya ke malang page renders armada list with correct image storage URL', function () {
    Armada::factory()->create([
        'title' => 'Innova Zenix Malang Test',
        'featured_image' => 'armadas/test-zenix-malang.jpg',
        'is_published' => true,
    ]);

    $response = $this->get(route('simak-sewa-mobil-surabaya-ke-malang'));

    $response->assertOk();
    $response->assertSee('storage/armadas/test-zenix-malang.jpg');
});

test('sitemap includes simak sewa mobil surabaya ke malang url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('simak-sewa-mobil-surabaya-ke-malang'), false);
});
