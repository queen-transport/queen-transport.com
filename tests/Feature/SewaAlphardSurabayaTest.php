<?php

use App\Livewire\SewaAlphardSurabaya;
use App\Models\Armada;
use App\Models\Pelanggan;
use App\Services\SewaAlphardSurabayaService;
use Livewire\Livewire;

test('sewa alphard surabaya service returns expected data structure', function () {
    $service = new SewaAlphardSurabayaService;

    Armada::factory()->create([
        'title' => 'Toyota Alphard Transformer Gen 3',
        'car_type' => 'Alphard',
        'is_published' => true,
    ]);

    Pelanggan::factory()->create([
        'name' => 'Budi Santoso',
        'is_published' => true,
    ]);

    $data = $service->getData();

    expect($data)->toHaveKeys(['alphardArmadas', 'allArmadas', 'pelanggans', 'alphardPrices', 'faqs']);
    expect($data['alphardArmadas']->count())->toBeGreaterThan(0);
    expect($data['alphardArmadas']->first()->title)->toBe('Toyota Alphard Transformer Gen 3');
    expect($data['pelanggans']->count())->toBeGreaterThan(0);
    expect($data['alphardPrices'])->toBeArray();
    expect($data['faqs'])->toBeArray();
});

test('sewa alphard surabaya page renders successfully via livewire', function () {
    $response = $this->get(route('sewa-alphard-surabaya'));

    $response->assertOk();
    $response->assertSee('Sewa Alphard');
    $response->assertSee('Surabaya');
    $response->assertSee(config('site.brand'));

    Livewire::test(SewaAlphardSurabaya::class)
        ->assertStatus(200)
        ->assertSee('Sewa Alphard');
});

test('sewa alphard surabaya page displays alphard armada with price when present', function () {
    Armada::factory()->create([
        'title' => 'All New Alphard HEV Hybrid',
        'car_type' => 'Alphard',
        'price' => 3800000,
        'is_published' => true,
    ]);

    $response = $this->get(route('sewa-alphard-surabaya'));

    $response->assertOk();
    $response->assertSee('All New Alphard HEV Hybrid');
    $response->assertSee('3.800.000');

    Livewire::test(SewaAlphardSurabaya::class)
        ->assertSee('All New Alphard HEV Hybrid')
        ->assertSee('3.800.000');
});
