<?php

namespace App\Services;

use App\Contracts\ReviewServiceInterface;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReviewService implements ReviewServiceInterface
{
    /**
     * Create a review submitted by a regular user.
     *
     * @param  array{rating: int, comment: string, title?: string|null, armada_ids?: array<int>}  $data
     * @param  array<UploadedFile>  $photos
     * @param  array<UploadedFile>  $videos
     */
    public function createReview(User $user, array $data, array $photos = [], array $videos = []): Review
    {
        Gate::forUser($user)->authorize('create', Review::class);

        logger()->info('Attempting to create review for user', [
            'user_id' => $user->id,
            'rating' => $data['rating'] ?? null,
            'photos_count' => count($photos),
            'videos_count' => count($videos),
        ]);

        return DB::transaction(function () use ($user, $data, $photos, $videos) {
            $review = Review::create([
                'user_id' => $user->id,
                'rating' => $data['rating'],
                'title' => $data['title'] ?? null,
                'comment' => $data['comment'],
                'status' => Review::STATUS_PENDING,
                'created_by_admin' => false,
            ]);

            if (! empty($data['armada_ids'])) {
                $review->armadas()->sync($data['armada_ids']);
            }

            foreach ($photos as $photo) {
                if ($photo instanceof UploadedFile) {
                    $review->addMedia($photo)->toMediaCollection('photos');
                }
            }

            foreach ($videos as $video) {
                if ($video instanceof UploadedFile) {
                    $review->addMedia($video)->toMediaCollection('videos');
                }
            }

            logger()->info('Review created successfully', [
                'review_id' => $review->id,
                'user_id' => $user->id,
                'status' => $review->status,
            ]);

            return $review->fresh(['armadas', 'media']);
        });
    }

    /**
     * Update an existing review, enforcing the 24-hour limit and ownership.
     *
     * @param  array{rating?: int, comment?: string, title?: string|null, armada_ids?: array<int>}  $data
     * @param  array<UploadedFile>  $newPhotos
     * @param  array<UploadedFile>  $newVideos
     * @param  array<int>  $removeMediaIds
     */
    public function updateReview(Review $review, User $user, array $data, array $newPhotos = [], array $newVideos = [], array $removeMediaIds = []): Review
    {
        Gate::forUser($user)->authorize('update', $review);

        logger()->info('Updating review', [
            'review_id' => $review->id,
            'user_id' => $user->id,
        ]);

        return DB::transaction(function () use ($review, $data, $newPhotos, $newVideos, $removeMediaIds) {
            $fillable = array_intersect_key($data, array_flip(['rating', 'title', 'comment']));
            if (! empty($fillable)) {
                $review->update($fillable);
            }

            if (array_key_exists('armada_ids', $data)) {
                $review->armadas()->sync($data['armada_ids'] ?? []);
            }

            // Remove requested media items
            if (! empty($removeMediaIds)) {
                Media::whereIn('id', $removeMediaIds)
                    ->where('model_type', Review::class)
                    ->where('model_id', $review->id)
                    ->get()
                    ->each(fn (Media $m) => $m->delete());
            }

            // Add new photos
            foreach ($newPhotos as $photo) {
                if ($photo instanceof UploadedFile) {
                    $review->addMedia($photo)->toMediaCollection('photos');
                }
            }

            // Add new videos
            foreach ($newVideos as $video) {
                if ($video instanceof UploadedFile) {
                    $review->addMedia($video)->toMediaCollection('videos');
                }
            }

            logger()->info('Review updated successfully', [
                'review_id' => $review->id,
            ]);

            return $review->fresh(['armadas', 'media']);
        });
    }

    /**
     * Delete an existing review, enforcing the 24-hour limit and ownership.
     */
    public function deleteReview(Review $review, User $user): bool
    {
        Gate::forUser($user)->authorize('delete', $review);

        logger()->info('Deleting review', [
            'review_id' => $review->id,
            'user_id' => $user->id,
        ]);

        return DB::transaction(function () use ($review) {
            $review->clearMediaCollection('photos');
            $review->clearMediaCollection('videos');
            $review->armadas()->detach();
            $deleted = (bool) $review->delete();

            logger()->info('Review deleted successfully', [
                'review_id' => $review->id,
            ]);

            return $deleted;
        });
    }

    /**
     * Approve a review for public display.
     */
    public function approveReview(Review $review): Review
    {
        if (auth()->check()) {
            Gate::authorize('approve', $review);
        }

        $review->update(['status' => Review::STATUS_APPROVED]);

        logger()->info('Review approved', [
            'review_id' => $review->id,
        ]);

        return $review;
    }

    /**
     * Reject a review.
     */
    public function rejectReview(Review $review): Review
    {
        if (auth()->check()) {
            Gate::authorize('reject', $review);
        }

        $review->update(['status' => Review::STATUS_REJECTED]);

        logger()->info('Review rejected', [
            'review_id' => $review->id,
        ]);

        return $review;
    }

    /**
     * Create a review directly by an admin.
     *
     * @param  array{user_id: int, rating: int, comment: string, title?: string|null, armada_ids?: array<int>, status?: string}  $data
     * @param  array<UploadedFile>  $photos
     * @param  array<UploadedFile>  $videos
     */
    public function adminCreateReview(array $data, array $photos = [], array $videos = []): Review
    {
        if (auth()->check()) {
            Gate::authorize('adminCreate', Review::class);
        }

        logger()->info('Admin creating review', [
            'user_id' => $data['user_id'],
            'rating' => $data['rating'],
            'status' => $data['status'] ?? Review::STATUS_APPROVED,
        ]);

        return DB::transaction(function () use ($data, $photos, $videos) {
            $review = Review::create([
                'user_id' => $data['user_id'],
                'rating' => $data['rating'],
                'title' => $data['title'] ?? null,
                'comment' => $data['comment'],
                'status' => $data['status'] ?? Review::STATUS_APPROVED,
                'created_by_admin' => true,
            ]);

            if (! empty($data['armada_ids'])) {
                $review->armadas()->sync($data['armada_ids']);
            }

            foreach ($photos as $photo) {
                if ($photo instanceof UploadedFile) {
                    $review->addMedia($photo)->toMediaCollection('photos');
                }
            }

            foreach ($videos as $video) {
                if ($video instanceof UploadedFile) {
                    $review->addMedia($video)->toMediaCollection('videos');
                }
            }

            logger()->info('Admin review created successfully', [
                'review_id' => $review->id,
            ]);

            return $review->fresh(['armadas', 'media']);
        });
    }
}
