<?php

use App\Models\Category;
use App\Models\Post;

test('blog index lists only published posts', function () {
    Post::factory()->create(['title' => 'Published Post', 'status' => 'published', 'published_at' => now()]);
    Post::factory()->draft()->create(['title' => 'Draft Post']);

    $response = $this->get(route('blog.index'));

    $response->assertOk();
    $response->assertSee('Published Post');
    $response->assertDontSee('Draft Post');
});

test('blog show resolves by year, month and slug', function () {
    $post = Post::factory()->create([
        'title' => 'Tips Sewa Mobil Mewah',
        'status' => 'published',
        'published_at' => '2025-03-15 10:00:00',
    ]);

    $response = $this->get('/2025/03/'.$post->slug);

    $response->assertOk();
    $response->assertSee('Tips Sewa Mobil Mewah');
});

test('blog show 404s for wrong month', function () {
    $post = Post::factory()->create([
        'status' => 'published',
        'published_at' => '2025-03-15 10:00:00',
    ]);

    $response = $this->get('/2025/04/'.$post->slug);

    $response->assertNotFound();
});

test('two posts can share the same slug in different months', function () {
    $first = Post::factory()->create([
        'title' => 'Artikel Sama',
        'slug' => 'artikel-sama',
        'status' => 'published',
        'published_at' => '2025-01-10 10:00:00',
    ]);

    $second = Post::factory()->create([
        'title' => 'Artikel Sama',
        'slug' => 'artikel-sama',
        'status' => 'published',
        'published_at' => '2025-02-10 10:00:00',
    ]);

    $this->get('/2025/01/artikel-sama')->assertOk();
    $this->get('/2025/02/artikel-sama')->assertOk();

    expect($first->id)->not->toBe($second->id);
});

test('blog show resolves plain permalink by slug', function () {
    $post = Post::factory()->plainPermalink()->create([
        'title' => 'Tips Sewa Mobil Mewah',
        'slug' => 'tips-sewa-mobil-mewah',
        'status' => 'published',
        'published_at' => '2025-03-15 10:00:00',
    ]);

    $response = $this->get('/'.$post->slug);

    $response->assertOk();
    $response->assertSee('Tips Sewa Mobil Mewah');
});

test('date permalink post redirects to plain url after switching mode', function () {
    $post = Post::factory()->plainPermalink()->create([
        'slug' => 'artikel-pindah-mode',
        'status' => 'published',
        'published_at' => '2025-03-15 10:00:00',
    ]);

    $response = $this->get('/2025/03/artikel-pindah-mode');

    $response->assertRedirect($post->url);
    $response->assertStatus(301);
});

test('plain permalink post redirects to date url after switching mode', function () {
    $post = Post::factory()->create([
        'slug' => 'artikel-pindah-mode-lagi',
        'status' => 'published',
        'published_at' => '2025-03-15 10:00:00',
    ]);

    $response = $this->get('/'.$post->slug);

    $response->assertRedirect($post->url);
    $response->assertStatus(301);
});

test('post url attribute reflects permalink type', function () {
    $datePost = Post::factory()->create(['slug' => 'date-post', 'published_at' => '2025-03-15']);
    $plainPost = Post::factory()->plainPermalink()->create(['slug' => 'plain-post']);

    expect($datePost->url)->toContain('/2025/03/date-post')
        ->and($plainPost->url)->toContain('/plain-post')
        ->and($plainPost->url)->not->toContain('/2025/');
});

test('post exposes seo fallbacks when meta fields are empty', function () {
    $post = Post::factory()->create([
        'title' => 'Judul Artikel',
        'excerpt' => 'Ringkasan artikel',
        'meta_title' => null,
        'meta_description' => null,
        'featured_image' => 'blog/foto.jpg',
        'og_image' => null,
    ]);

    expect($post->seo_title)->toBe('Judul Artikel')
        ->and($post->seo_description)->toBe('Ringkasan artikel')
        ->and($post->seo_image)->toBe('blog/foto.jpg');
});

test('category has many posts', function () {
    $category = Category::factory()->create();
    Post::factory()->count(2)->create(['category_id' => $category->id]);

    expect($category->posts()->count())->toBe(2);
});
