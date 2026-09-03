<?php

use App\Filament\Resources\Armadas\Pages\CreateArmada;
use App\Models\Armada;
use App\Models\User;
use Livewire\Livewire;

test('armada index lists only published armada', function () {
    Armada::factory()->create(['title' => 'Visible Car', 'is_published' => true]);
    Armada::factory()->create(['title' => 'Hidden Car', 'is_published' => false]);

    $response = $this->get(route('armada.index'));

    $response->assertOk();
    $response->assertSee('Visible Car');
    $response->assertDontSee('Hidden Car');
});

test('armada show displays the armada detail', function () {
    $armada = Armada::factory()->create(['title' => 'Alphard Prestige']);

    $response = $this->get(route('armada.show', $armada));

    $response->assertOk();
    $response->assertSee('Alphard Prestige');
});

test('armada resolves by slug in route', function () {
    $armada = Armada::factory()->create(['title' => 'Vellfire Royale']);

    $response = $this->get('/armada/'.$armada->slug);

    $response->assertOk();
});

test('admin can create armada from filament resource', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);

    Livewire::actingAs($admin)
        ->test(CreateArmada::class)
        ->fillForm([
            'title' => 'Zenix Type Q Hybrid',
            'slug' => 'zenix-type-q-hybrid',
            'price' => 2250000,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $armada = Armada::where('slug', 'zenix-type-q-hybrid')->first();
    expect($armada)->not->toBeNull();
    expect($armada->price)->toBe(2250000);
    expect($armada->formatted_price)->toBe('Rp 2.250.000');
});

test('gallery normalizes legacy nested items to flat paths', function () {
    $armada = Armada::factory()->create();

    $armada->setRawAttributes(array_merge($armada->getAttributes(), [
        'gallery' => json_encode([
            ['path' => 'armada/gallery/one.jpg'],
            ['url' => 'armada/gallery/two.jpg'],
            'armada/gallery/three.jpg',
        ]),
    ]));

    expect($armada->gallery)->toBe([
        'armada/gallery/one.jpg',
        'armada/gallery/two.jpg',
        'armada/gallery/three.jpg',
    ]);
});

test('gallery is persisted as a flat array of paths', function () {
    $armada = Armada::factory()->create([
        'gallery' => ['armada/gallery/a.jpg', 'armada/gallery/b.jpg'],
    ]);

    expect($armada->fresh()->gallery)->toBe([
        'armada/gallery/a.jpg',
        'armada/gallery/b.jpg',
    ]);
});
