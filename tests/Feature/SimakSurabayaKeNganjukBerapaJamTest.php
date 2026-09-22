<?php

use App\Models\Armada;

test('simak surabaya ke nganjuk berapa jam page renders successfully via folio', function () {
    $response = $this->get(route('simak-surabaya-ke-nganjuk-berapa-jam'));

    $response->assertOk();
    $response->assertSee('Simak Surabaya ke Nganjuk Berapa Jam');
    $response->assertSee('Estimasi Waktu, Rute Tol');
    $response->assertSee('1,5 hingga 2 jam');
    $response->assertSee('Tol Trans Jawa');
    $response->assertSee('Badan Pengatur Jalan Tol (BPJT)');
    $response->assertSee('dapat berubah sewaktu-waktu');
    $response->assertSee(config('site.brand'));
});

test('simak surabaya ke nganjuk berapa jam page renders armada list with correct image storage URL', function () {
    Armada::factory()->create([
        'title' => 'Innova Zenix Luar Kota Test',
        'featured_image' => 'armadas/test-zenix.jpg',
        'is_published' => true,
    ]);

    $response = $this->get(route('simak-surabaya-ke-nganjuk-berapa-jam'));

    $response->assertOk();
    $response->assertSee('storage/armadas/test-zenix.jpg');
});

test('sitemap includes simak surabaya ke nganjuk berapa jam url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('simak-surabaya-ke-nganjuk-berapa-jam'), false);
});
