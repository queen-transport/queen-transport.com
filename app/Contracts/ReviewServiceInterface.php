<?php

namespace App\Contracts;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\UploadedFile;

interface ReviewServiceInterface
{
    /**
     * Create a review submitted by a regular user.
     *
     * @param  array{rating: int, comment: string, title?: string|null, car_review?: string|null, driver_review?: string|null, facilities_review?: string|null, armada_ids?: array<int>}  $data
     * @param  array<UploadedFile>  $photos
     * @param  array<UploadedFile>  $videos
     */
    public function createReview(User $user, array $data, array $photos = [], array $videos = []): Review;

    /**
     * Update an existing review, enforcing the 24-hour limit and ownership.
     *
     * @param  array{rating?: int, comment?: string, title?: string|null, car_review?: string|null, driver_review?: string|null, facilities_review?: string|null, armada_ids?: array<int>}  $data
     * @param  array<UploadedFile>  $newPhotos
     * @param  array<UploadedFile>  $newVideos
     * @param  array<int>  $removeMediaIds
     */
    public function updateReview(Review $review, User $user, array $data, array $newPhotos = [], array $newVideos = [], array $removeMediaIds = []): Review;

    /**
     * Delete an existing review, enforcing the 24-hour limit and ownership.
     */
    public function deleteReview(Review $review, User $user): bool;

    /**
     * Approve a review for public display.
     */
    public function approveReview(Review $review): Review;

    /**
     * Reject a review.
     */
    public function rejectReview(Review $review): Review;

    /**
     * Create a review directly by an admin.
     *
     * @param  array{user_id: int, rating: int, comment: string, title?: string|null, car_review?: string|null, driver_review?: string|null, facilities_review?: string|null, armada_ids?: array<int>, status?: string}  $data
     * @param  array<UploadedFile>  $photos
     * @param  array<UploadedFile>  $videos
     */
    public function adminCreateReview(array $data, array $photos = [], array $videos = []): Review;
}
