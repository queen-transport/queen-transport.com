<?php

namespace App\Models;

use Database\Factories\GaleriFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    /** @use HasFactory<GaleriFactory> */
    use HasFactory;

    protected $casts = [
        'gallery' => 'array',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Galeri $galeri): void {
            if (blank($galeri->slug)) {
                $galeri->slug = Str::slug($galeri->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
