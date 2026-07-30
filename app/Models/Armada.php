<?php

namespace App\Models;

use Database\Factories\ArmadaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'gallery' => 'array',
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Armada $armada): void {
            if (blank($armada->slug)) {
                $armada->slug = Str::slug($armada->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
