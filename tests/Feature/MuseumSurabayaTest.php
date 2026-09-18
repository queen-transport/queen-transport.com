<?php

use App\Models\Armada;
use App\Models\Pelanggan;
use App\Services\ArmadaService;

test('armada service retrieves published armadas for museum page', function () {
    $armadaService = app(ArmadaService::class);

    Armada::factory()->create([
        'title' => 'Toyota Hiace Premio Luxury',
        'car_type' => 'Hiace',
        'is_published' => true,
    ]);

    Pelanggan::factory()->create([
        'name' => 'Budi Santoso',
        'is_published' => true,
    ]);

    $armadas = $armadaService->getPublished();

    expect($armadas->count())->toBeGreaterThan(0);
});

test('museum di surabaya yuk belajar sejarah page renders successfully via folio', function () {
    $response = $this->get(route('museum-di-surabaya-yuk-belajar-sejarah'));

    $response->assertOk();
    $response->assertSee('Museum di Surabaya');
    $response->assertSee('Yuk Belajar Sejarah');
    $response->assertSee(config('site.brand'));
});

test('sitemap includes museum di surabaya yuk belajar sejarah url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('museum-di-surabaya-yuk-belajar-sejarah'), false);
});
