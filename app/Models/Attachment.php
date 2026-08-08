<?php

namespace App\Models;

use Database\Factories\AttachmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * A single entry in the WordPress-style media library: one uploaded file,
 * reusable across any resource in the admin panel.
 */
class Attachment extends Model implements HasMedia
{
    /** @use HasFactory<AttachmentFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'alt_text',
        'source_path',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file')
            ->useDisk('public')
            ->singleFile();
    }

    public function getFileMedia(): ?Media
    {
        return $this->getFirstMedia('file');
    }

    public function getUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('file') ?: null;
    }

    public function getPathAttribute(): ?string
    {
        return $this->getFileMedia()?->getPathRelativeToRoot();
    }

    public function getFileNameAttribute(): ?string
    {
        return $this->getFileMedia()?->file_name;
    }

    public function getMimeTypeAttribute(): ?string
    {
        return $this->getFileMedia()?->mime_type;
    }

    public function getSizeAttribute(): ?int
    {
        return $this->getFileMedia()?->size;
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }

    public function isVideo(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'video/');
    }
}
