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
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Armada::where('slug', 'zenix-type-q-hybrid')->exists())->toBeTrue();
});
