<?php

use App\Models\Armada;
use App\Models\Galeri;
use App\Models\Post;

test('front page renders with no content seeded', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee(config('site.brand'));
    $response->assertSee('Struktur');
    $response->assertSee('Organisasi');
    $response->assertSee('Pak Fauzan');
    $response->assertSee('6282231037255');
});

test('front page renders armada, galeri, and blog sections', function () {
    Armada::factory()->create(['title' => 'Alphard Prestige']);
    Galeri::factory()->create(['title' => 'Momen Perjalanan']);
    Post::factory()->create(['title' => 'Tips Sewa Mobil', 'status' => 'published', 'published_at' => now()]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Alphard Prestige');
    $response->assertSee('Tips Sewa Mobil');
});
