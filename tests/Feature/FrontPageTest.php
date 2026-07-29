<?php

use App\Models\Armada;
use App\Models\Galeri;
use App\Models\Pelanggan;
use App\Models\Post;

test('front page renders with no content seeded', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee(config('site.brand'));
});

test('front page renders armada, galeri, pelanggan and blog sections', function () {
    Armada::factory()->create(['title' => 'Alphard Prestige']);
    Galeri::factory()->create(['title' => 'Momen Perjalanan']);
    Pelanggan::factory()->create(['name' => 'Budi Santoso']);
    Post::factory()->create(['title' => 'Tips Sewa Mobil', 'status' => 'published', 'published_at' => now()]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Alphard Prestige');
    $response->assertSee('Budi Santoso');
    $response->assertSee('Tips Sewa Mobil');
});
