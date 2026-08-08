<?php

use App\Models\Armada;
use App\Models\Post;

test('sitemap includes static pages and published content', function () {
    $armada = Armada::factory()->create(['is_published' => true]);
    $hiddenArmada = Armada::factory()->create(['is_published' => false]);
    $post = Post::factory()->create();
    $draftPost = Post::factory()->draft()->create();

    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
    $response->assertSee(route('home'), false);
    $response->assertSee(route('armada.index'), false);
    $response->assertSee(route('blog.index'), false);
    $response->assertSee(route('armada.show', $armada), false);
    $response->assertSee($post->url, false);
    $response->assertDontSee(route('armada.show', $hiddenArmada), false);
    $response->assertDontSee($draftPost->slug, false);
});
