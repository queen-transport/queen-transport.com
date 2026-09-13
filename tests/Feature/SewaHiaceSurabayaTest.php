<?php

use App\Models\Armada;
use App\Models\Pelanggan;
use App\Services\ArmadaService;

test('armada service returns expected hiace page data structure', function () {
    $service = new ArmadaService;

    Armada::factory()->create([
        'title' => 'Toyota Hiace Commuter 14 Seat',
        'car_type' => 'Hiace',
        'is_published' => true,
    ]);

    Pelanggan::factory()->create([
        'name' => 'Ahmad Fauzi',
        'is_published' => true,
    ]);

    $data = $service->getHiacePageData();

    expect($data)->toHaveKeys(['hiaceArmadas', 'allArmadas', 'pelanggans', 'hiacePrices', 'faqs']);
    expect($data['hiaceArmadas']->count())->toBeGreaterThan(0);
    expect($data['hiaceArmadas']->first()->title)->toBe('Toyota Hiace Commuter 14 Seat');
    expect($data['pelanggans']->count())->toBeGreaterThan(0);
    expect($data['hiacePrices'])->toBeArray();
    expect($data['faqs'])->toBeArray();
});

test('sewa hiace surabaya page renders successfully via folio', function () {
    $response = $this->get(route('sewa-hiace-surabaya'));

    $response->assertOk();
    $response->assertSee('Sewa Hiace');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));
});

test('sewa hiace surabaya page displays hiace armada when present', function () {
    $hiace = Armada::factory()->create([
        'title' => 'Hiace Premio Luxury VIP',
        'car_type' => 'Hiace',
        'is_published' => true,
    ]);

    $response = $this->get(route('sewa-hiace-surabaya'));

    $response->assertOk();
    $response->assertSee('Hiace Premio Luxury VIP');
});
