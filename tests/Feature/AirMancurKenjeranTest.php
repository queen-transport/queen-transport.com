<?php

use App\Models\Armada;
use App\Models\Pelanggan;
use App\Services\AirMancurKenjeranService;
use App\Services\ArmadaService;

test('air mancur kenjeran service returns expected page data structure', function () {
    $armadaService = app(ArmadaService::class);
    $service = new AirMancurKenjeranService($armadaService);

    Armada::factory()->create([
        'title' => 'Toyota Hiace Premio Luxury',
        'car_type' => 'Hiace',
        'is_published' => true,
    ]);

    Pelanggan::factory()->create([
        'name' => 'Siti Rahma',
        'is_published' => true,
    ]);

    $data = $service->getAirMancurKenjeranPageData();

    expect($data)->toHaveKeys(['allArmadas', 'pelanggans', 'faqs']);
    expect($data['allArmadas']->count())->toBeGreaterThan(0);
    expect($data['allArmadas']->first()->title)->toBe('Toyota Hiace Premio Luxury');
    expect($data['pelanggans']->count())->toBeGreaterThan(0);
    expect($data['faqs'])->toBeArray();
});

test('air mancur kenjeran page renders successfully via folio', function () {
    $response = $this->get(route('air-mancur-kenjeran'));

    $response->assertOk();
    $response->assertSee('Air Mancur Kenjeran');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));
});

test('sitemap includes air mancur kenjeran url', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee(route('air-mancur-kenjeran'), false);
});
