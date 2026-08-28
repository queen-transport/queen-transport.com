<?php

namespace App\Models;

use Database\Factories\PelangganFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Pelanggan extends Model
{
    /** @use HasFactory<PelangganFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Pelanggan $pelanggan): void {
            if (blank($pelanggan->slug)) {
                $pelanggan->slug = Str::slug($pelanggan->name);
            }
        });

        static::deleting(function (Pelanggan $pelanggan): void {
            if ($pelanggan->photo) {
                Storage::disk('public')->delete($pelanggan->photo);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
