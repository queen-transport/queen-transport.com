<?php

use App\Models\Armada;
use App\Models\Pelanggan;
use App\Services\ArmadaService;

test('armada service retrieves published armadas for air mancur kenjeran page', function () {
    $armadaService = app(ArmadaService::class);

    Armada::factory()->create([
        'title' => 'Toyota Hiace Premio Luxury',
        'car_type' => 'Hiace',
        'is_published' => true,
    ]);

    Pelanggan::factory()->create([
        'name' => 'Siti Rahma',
        'is_published' => true,
    ]);

    $armadas = $armadaService->getPublished();

    expect($armadas->count())->toBeGreaterThan(0);
    expect($armadas->first()->title)->toBe('Toyota Hiace Premio Luxury');
});

test('air mancur kenjeran page renders successfully via folio', function () {
    $response = $this->get(route('air-mancur-kenjeran'));

    $response->assertOk();
    $response->assertSee('Air Mancur Kenjeran');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));
});

test('air mancur kenjeran page renders armada list with correct image storage URL', function () {
    Armada::factory()->create([
        'title' => 'Alphard Luxury Test',
        'featured_image' => 'armadas/test-alphard.jpg',
        'is_published' => true,
    ]);

    $response = $this->get(route('air-mancur-kenjeran'));

    $response->assertOk();
    $response->assertSee('storage/armadas/test-alphard.jpg');
});

test('sitemap includes air mancur kenjeran url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('air-mancur-kenjeran'), false);
});

