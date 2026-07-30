<?php

namespace App\Support;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleXMLElement;

class WordPressPostImporter
{
    private const NAMESPACES = [
        'wp' => 'http://wordpress.org/export/1.2/',
        'content' => 'http://purl.org/rss/1.0/modules/content/',
        'excerpt' => 'http://wordpress.org/export/1.2/excerpt/',
    ];

    /**
     * @return array{imported: int, skipped: int, errors: list<string>}
     */
    public function import(string $xmlContents, ?int $authorId = null, bool $onlyPublished = true): array
    {
        $xml = new SimpleXMLElement($xmlContents);

        foreach (self::NAMESPACES as $prefix => $uri) {
            $xml->registerXPathNamespace($prefix, $uri);
        }

        $attachments = $this->mapAttachments($xml);

        $imported = 0;
        $skipped = 0;
        $errors = [];

        foreach ($xml->xpath('//item') as $item) {
            $postType = (string) $this->child($item, 'wp', 'post_type');

            if ($postType !== 'post') {
                continue;
            }

            $status = (string) $this->child($item, 'wp', 'status');

            if ($onlyPublished && $status !== 'publish') {
                $skipped++;

                continue;
            }

            try {
                if ($this->importItem($item, $attachments, $authorId, $status)) {
                    $imported++;
                } else {
                    $skipped++;
                }
            } catch (\Throwable $e) {
                $errors[] = sprintf('"%s": %s', (string) $item->title, $e->getMessage());
            }
        }

        return [
            'imported' => $imported,
            'skipped' => $skipped,
            'errors' => $errors,
        ];
    }

    private function importItem(SimpleXMLElement $item, array $attachments, ?int $authorId, string $status): bool
    {
        $title = (string) $item->title;
        $slug = (string) $this->child($item, 'wp', 'post_name') ?: Str::slug($title);
        $publishedAt = $this->parsePostDate((string) $this->child($item, 'wp', 'post_date'));

        $exists = Post::query()
            ->where('slug', $slug)
            ->where('published_at', $publishedAt)
            ->exists();

        if ($exists) {
            return false;
        }

        $content = (string) $this->child($item, 'content', 'encoded');
        $excerpt = (string) $this->child($item, 'excerpt', 'encoded');

        $category = $this->firstTermOfDomain($item, 'category');
        $tags = $this->allTermsOfDomain($item, 'post_tag');

        $post = new Post([
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt !== '' ? $excerpt : null,
            'content' => $content !== '' ? $content : null,
            'status' => $status === 'publish' ? 'published' : 'draft',
            'published_at' => $publishedAt,
            'user_id' => $authorId,
            'category_id' => $category ? $this->findOrCreateCategory($category)->id : null,
            'featured_image' => $this->downloadFeaturedImage($item, $attachments),
        ]);

        $post->save();

        if ($tags !== []) {
            $post->tags()->sync(collect($tags)->map(
                fn (array $tag) => $this->findOrCreateTag($tag)->id
            ));
        }

        return true;
    }

    /**
     * @return array<int, string> attachment post id => attachment URL
     */
    private function mapAttachments(SimpleXMLElement $xml): array
    {
        $attachments = [];

        foreach ($xml->xpath('//item') as $item) {
            if ((string) $this->child($item, 'wp', 'post_type') !== 'attachment') {
                continue;
            }

            $postId = (string) $this->child($item, 'wp', 'post_id');
            $url = (string) $this->child($item, 'wp', 'attachment_url');

            if ($postId !== '' && $url !== '') {
                $attachments[$postId] = $url;
            }
        }

        return $attachments;
    }

    private function downloadFeaturedImage(SimpleXMLElement $item, array $attachments): ?string
    {
        $thumbnailId = null;

        foreach ($item->xpath('wp:postmeta') as $meta) {
            if ((string) $this->child($meta, 'wp', 'meta_key') === '_thumbnail_id') {
                $thumbnailId = (string) $this->child($meta, 'wp', 'meta_value');

                break;
            }
        }

        $url = $thumbnailId !== null ? ($attachments[$thumbnailId] ?? null) : null;

        if ($url === null) {
            return null;
        }

        try {
            $response = Http::timeout(15)->get($url);

            if (! $response->successful()) {
                return null;
            }

            $filename = 'blog/'.Str::random(20).'.'.(pathinfo(parse_url($url, PHP_URL_PATH) ?: '', PATHINFO_EXTENSION) ?: 'jpg');

            Storage::disk('public')->put($filename, $response->body());

            return $filename;
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * @return array{slug: string, name: string}|null
     */
    private function firstTermOfDomain(SimpleXMLElement $item, string $domain): ?array
    {
        $terms = $this->allTermsOfDomain($item, $domain);

        return $terms[0] ?? null;
    }

    /**
     * @return list<array{slug: string, name: string}>
     */
    private function allTermsOfDomain(SimpleXMLElement $item, string $domain): array
    {
        $terms = [];

        foreach ($item->category as $category) {
            $attributes = $category->attributes();

            if ((string) $attributes['domain'] !== $domain) {
                continue;
            }

            $slug = (string) $attributes['nicename'];
            $name = (string) $category;

            if ($slug === '' && $name === '') {
                continue;
            }

            $terms[] = [
                'slug' => $slug !== '' ? $slug : Str::slug($name),
                'name' => $name !== '' ? $name : $slug,
            ];
        }

        return $terms;
    }

    /**
     * @param  array{slug: string, name: string}  $term
     */
    private function findOrCreateCategory(array $term): Category
    {
        return Category::query()->firstOrCreate(
            ['slug' => $term['slug']],
            ['name' => $term['name']]
        );
    }

    /**
     * @param  array{slug: string, name: string}  $term
     */
    private function findOrCreateTag(array $term): Tag
    {
        return Tag::query()->firstOrCreate(
            ['slug' => $term['slug']],
            ['name' => $term['name']]
        );
    }

    private function parsePostDate(string $value): ?string
    {
        if ($value === '' || $value === '0000-00-00 00:00:00') {
            return null;
        }

        return $value;
    }

    private function child(SimpleXMLElement $element, string $prefix, string $name): ?SimpleXMLElement
    {
        $children = $element->children(self::NAMESPACES[$prefix]);

        return $children->{$name} ?? null;
    }
}
