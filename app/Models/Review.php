<?php

namespace App\Models;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property string $id
 * @property int $user_id
 * @property int $rating
 * @property string|null $title
 * @property string $comment
 * @property string $status
 * @property bool $created_by_admin
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Review extends Model implements HasMedia
{
    /** @use HasFactory<ReviewFactory> */
    use HasFactory, HasUuids, InteractsWithMedia;

    public const STATUS_PENDING = 'pending';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'user_id',
        'rating',
        'title',
        'comment',
        'status',
        'created_by_admin',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'created_by_admin' => 'boolean',
    ];

    /**
     * Register Spatie media collections for photos and videos.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);

        $this->addMediaCollection('videos')
            ->acceptsFile(function ($file) {
                $mime = $file->mimeType ?? '';
                $ext = strtolower(pathinfo($file->name ?? '', PATHINFO_EXTENSION));

                return str_starts_with($mime, 'video/') || in_array($ext, ['mp4', 'mov', 'webm', 'avi', 'mkv']) || $mime === 'application/x-empty';
            });
    }

    /**
     * Relation to the user who wrote the review.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Optional many-to-many relation to Armadas.
     */
    public function armadas(): BelongsToMany
    {
        return $this->belongsToMany(Armada::class, 'armada_review')->withTimestamps();
    }

    /**
     * Scope for approved reviews.
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    /**
     * Scope for pending reviews.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope for rejected reviews.
     */
    public function scopeRejected(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_REJECTED);
    }

    /**
     * Check if a review can be edited or deleted by the given user.
     * Delegates directly to ReviewPolicy via Gate.
     */
    public function canBeEditedOrDeletedBy(?User $user): bool
    {
        if (! $user) {
            return false;
        }

        return Gate::forUser($user)->allows('update', $this);
    }

    /**
     * Check if the review has passed the 24-hour edit/delete window.
     */
    public function isLockedForUser(): bool
    {
        if (! $this->created_at) {
            return false;
        }

        return $this->created_at->diffInHours(now()) >= 24;
    }

    /**
     * Helper to get photo media items.
     *
     * @return Collection<int, Media>
     */
    public function getPhotosAttribute()
    {
        return $this->getMedia('photos');
    }

    /**
     * Helper to get video media items.
     *
     * @return Collection<int, Media>
     */
    public function getVideosAttribute()
    {
        return $this->getMedia('videos');
    }
}
