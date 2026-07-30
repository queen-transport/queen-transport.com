<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Support\WordPressPostImporter;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

function sampleWxr(string $status = 'publish'): string
{
    return <<<XML
    <?xml version="1.0" encoding="UTF-8"?>
    <rss version="2.0"
        xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:wp="http://wordpress.org/export/1.2/">
    <channel>
        <item>
            <title>Tips Merawat Mobil Mewah</title>
            <content:encoded><![CDATA[<p>Isi artikel lengkap.</p>]]></content:encoded>
            <excerpt:encoded><![CDATA[Ringkasan singkat.]]></excerpt:encoded>
            <wp:post_id>10</wp:post_id>
            <wp:post_date>2024-05-01 10:00:00</wp:post_date>
            <wp:post_name>tips-merawat-mobil-mewah</wp:post_name>
            <wp:status>{$status}</wp:status>
            <wp:post_type>post</wp:post_type>
            <category domain="category" nicename="tips-perawatan"><![CDATA[Tips Perawatan]]></category>
            <category domain="post_tag" nicename="mobil-mewah"><![CDATA[Mobil Mewah]]></category>
            <wp:postmeta>
                <wp:meta_key>_thumbnail_id</wp:meta_key>
                <wp:meta_value>99</wp:meta_value>
            </wp:postmeta>
        </item>
        <item>
            <title>featured.jpg</title>
            <wp:post_id>99</wp:post_id>
            <wp:post_type>attachment</wp:post_type>
            <wp:attachment_url>https://old.queen-transport.com/wp-content/uploads/featured.jpg</wp:attachment_url>
        </item>
    </channel>
    </rss>
    XML;
}

test('imports posts, categories, tags and featured image from a WXR file', function () {
    Storage::fake('public');
    Http::fake([
        'old.queen-transport.com/*' => Http::response('fake-image-bytes', 200),
    ]);

    $result = (new WordPressPostImporter)->import(sampleWxr());

    expect($result['imported'])->toBe(1)
        ->and($result['skipped'])->toBe(0)
        ->and($result['errors'])->toBe([]);

    $post = Post::query()->sole();

    expect($post->title)->toBe('Tips Merawat Mobil Mewah')
        ->and($post->slug)->toBe('tips-merawat-mobil-mewah')
        ->and($post->status)->toBe('published')
        ->and($post->excerpt)->toBe('Ringkasan singkat.')
        ->and($post->content)->toBe('<p>Isi artikel lengkap.</p>')
        ->and($post->featured_image)->not->toBeNull();

    Storage::disk('public')->assertExists($post->featured_image);

    expect(Category::query()->sole()->name)->toBe('Tips Perawatan');
    expect(Tag::query()->sole()->name)->toBe('Mobil Mewah');
    expect($post->tags()->pluck('name')->all())->toBe(['Mobil Mewah']);
});

test('skips draft posts when only_published is true', function () {
    $result = (new WordPressPostImporter)->import(sampleWxr('draft'), onlyPublished: true);

    expect($result['imported'])->toBe(0)
        ->and($result['skipped'])->toBe(1);

    expect(Post::query()->count())->toBe(0);
});

test('skips re-importing a post with the same slug and published date', function () {
    Storage::fake('public');
    Http::fake([
        'old.queen-transport.com/*' => Http::response('fake-image-bytes', 200),
    ]);

    $importer = new WordPressPostImporter;
    $importer->import(sampleWxr());
    $result = $importer->import(sampleWxr());

    expect($result['imported'])->toBe(0)
        ->and($result['skipped'])->toBe(1)
        ->and(Post::query()->count())->toBe(1);
});
