<?php

namespace App\Models;

use Database\Factories\ArmadaFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Armada extends Model
{
    /** @use HasFactory<ArmadaFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'car_type',
        'car_badge',
        'car_icon',
        'features',
        'description',
        'cta_text',
        'cta_url',
        'featured_image',
        'gallery',
        'video',
        'sort',
        'is_published',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'features' => 'array',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Armada $armada): void {
            if (blank($armada->slug)) {
                $armada->slug = Str::slug($armada->title);
            }
        });

        static::deleting(function (Armada $armada): void {
            Storage::disk('public')->delete(array_filter([
                $armada->featured_image,
                $armada->video,
                ...$armada->gallery,
            ]));
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Normalizes gallery storage to a flat array of file paths.
     *
     * Legacy/imported records may hold nested shapes like {"path": "..."} per
     * item instead of a bare string; the FileUpload repeater and public views
     * both expect plain path strings, so both directions are normalized here.
     *
     * @return Attribute<array<int, string>, array<int, string>|null>
     */
    protected function gallery(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => self::normalizeGalleryPaths(json_decode($value ?? '[]', true) ?: []),
            set: fn (?array $value) => json_encode(self::normalizeGalleryPaths($value ?? [])),
        );
    }

    /**
     * @param  array<mixed>  $items
     * @return array<int, string>
     */
    private static function normalizeGalleryPaths(array $items): array
    {
        $paths = array_map(
            fn ($item) => is_array($item) ? ($item['path'] ?? $item['url'] ?? null) : $item,
            $items,
        );

        return array_values(array_filter($paths, fn ($path) => is_string($path) && $path !== ''));
    }
}
