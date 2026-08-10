<?php

use App\Filament\Widgets\BusinessOverview;
use App\Filament\Widgets\LatestPosts;
use App\Filament\Widgets\PostsPerMonthChart;
use App\Models\Armada;
use App\Models\Pelanggan;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(User::factory()->create(['email' => 'admin@queen-transport.com']));
});

test('admin dashboard loads with the project widgets', function () {
    $response = $this->get('/admin');

    $response->assertOk();
    $response->assertSeeLivewire(BusinessOverview::class);
    $response->assertSeeLivewire(PostsPerMonthChart::class);
    $response->assertSeeLivewire(LatestPosts::class);
});

test('business overview widget reports fleet, article and testimonial stats', function () {
    Armada::factory()->count(2)->create(['is_published' => true]);
    Armada::factory()->create(['is_published' => false]);
    Post::factory()->create(['status' => 'published', 'published_at' => now()]);
    Post::factory()->create(['status' => 'draft', 'published_at' => null]);
    Pelanggan::factory()->create(['is_published' => true, 'bintang' => 5]);

    Livewire::test(BusinessOverview::class)
        ->assertSee('Armada Aktif')
        ->assertSee('Artikel Terpublikasi')
        ->assertSee('Testimoni Pelanggan');
});

test('latest posts widget lists recently created posts', function () {
    $post = Post::factory()->create(['title' => 'Artikel Widget Test', 'status' => 'published', 'published_at' => now()]);

    Livewire::test(LatestPosts::class)
        ->assertCanSeeTableRecords([$post]);
});
