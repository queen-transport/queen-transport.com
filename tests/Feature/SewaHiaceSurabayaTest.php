<?php

use App\Livewire\SewaHiaceSurabaya;
use App\Models\Armada;
use App\Models\Pelanggan;
use App\Services\SewaHiaceSurabayaService;
use Livewire\Livewire;

test('sewa hiace surabaya service returns expected data structure', function () {
    $service = new SewaHiaceSurabayaService;

    Armada::factory()->create([
        'title' => 'Toyota Hiace Commuter 14 Seat',
        'car_type' => 'Hiace',
        'is_published' => true,
    ]);

    Pelanggan::factory()->create([
        'name' => 'Ahmad Fauzi',
        'is_published' => true,
    ]);

    $data = $service->getData();

    expect($data)->toHaveKeys(['hiaceArmadas', 'allArmadas', 'pelanggans', 'hiacePrices', 'faqs']);
    expect($data['hiaceArmadas']->count())->toBeGreaterThan(0);
    expect($data['hiaceArmadas']->first()->title)->toBe('Toyota Hiace Commuter 14 Seat');
    expect($data['pelanggans']->count())->toBeGreaterThan(0);
    expect($data['hiacePrices'])->toBeArray();
    expect($data['faqs'])->toBeArray();
});

test('sewa hiace surabaya page renders successfully via livewire', function () {
    $response = $this->get(route('sewa-hiace-surabaya'));

    $response->assertOk();
    $response->assertSee('Sewa Hiace');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));

    Livewire::test(SewaHiaceSurabaya::class)
        ->assertStatus(200)
        ->assertSee('Sewa Hiace');
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

    Livewire::test(SewaHiaceSurabaya::class)
        ->assertSee('Hiace Premio Luxury VIP');
});
