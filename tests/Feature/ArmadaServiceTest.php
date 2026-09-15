<?php

use App\Models\Armada;
use App\Services\ArmadaService;

test('armada service retrieves published armadas', function () {
    $service = new ArmadaService;

    $published = Armada::factory()->create([
        'title' => 'Toyota Alphard Transformer',
        'car_type' => 'Alphard',
        'is_published' => true,
    ]);

    $draft = Armada::factory()->create([
        'title' => 'Toyota Hiace Draft',
        'car_type' => 'Hiace',
        'is_published' => false,
    ]);

    $result = $service->getPublished();

    expect($result->pluck('id'))->toContain($published->id);
    expect($result->pluck('id'))->not->toContain($draft->id);
});

test('armada service retrieves armadas by specific keywords and categories', function () {
    $service = new ArmadaService;

    $alphard = Armada::factory()->create([
        'title' => 'Toyota Alphard Gen 3',
        'car_type' => 'Luxury MPV',
        'is_published' => true,
    ]);

    $hiace = Armada::factory()->create([
        'title' => 'Toyota Hiace Premio',
        'car_type' => 'Minibus',
        'is_published' => true,
    ]);

    $fortuner = Armada::factory()->create([
        'title' => 'Toyota Fortuner VRZ',
        'car_type' => 'SUV',
        'is_published' => true,
    ]);

    $zenix = Armada::factory()->create([
        'title' => 'Innova Zenix Hybrid',
        'car_type' => 'MPV',
        'is_published' => true,
    ]);

    expect($service->getAlphard()->pluck('id'))->toContain($alphard->id);
    expect($service->getHiace()->pluck('id'))->toContain($hiace->id);
    expect($service->getFortuner()->pluck('id'))->toContain($fortuner->id);
    expect($service->getInnova()->pluck('id'))->toContain($zenix->id);
});

test('armada service retrieves armada by slug and related armadas', function () {
    $service = new ArmadaService;

    $armada1 = Armada::factory()->create([
        'title' => 'Toyota Hiace Commuter 14 Seat',
        'slug' => 'toyota-hiace-commuter-14-seat',
        'is_published' => true,
    ]);

    $armada2 = Armada::factory()->create([
        'title' => 'Toyota Hiace Premio Standard',
        'slug' => 'toyota-hiace-premio-standard',
        'is_published' => true,
    ]);

    $found = $service->getBySlug('toyota-hiace-commuter-14-seat');
    expect($found)->not->toBeNull();
    expect($found->id)->toBe($armada1->id);

    $related = $service->getRelated($armada1);
    expect($related->pluck('id'))->toContain($armada2->id);
    expect($related->pluck('id'))->not->toContain($armada1->id);
});

test('armada service provides kelas atas page data with surabaya prices and faqs', function () {
    $service = new ArmadaService;

    Armada::factory()->create([
        'title' => 'Toyota Alphard Gen 3',
        'car_type' => 'Luxury MPV',
        'price' => 2800000,
        'is_published' => true,
    ]);

    $data = $service->getKelasAtasPageData();

    expect($data)->toHaveKeys(['allArmadas', 'pelanggans', 'kelasAtasPrices', 'faqs']);
    expect($data['kelasAtasPrices'])->not->toBeEmpty();
    expect($data['kelasAtasPrices'][0]['note'])->toBe('Surabaya dan sekitarnya');
});
