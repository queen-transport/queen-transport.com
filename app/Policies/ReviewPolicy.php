<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any reviews.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the specific review.
     */
    public function view(?User $user, Review $review): bool
    {
        if ($review->status === Review::STATUS_APPROVED) {
            return true;
        }

        if (! $user) {
            return false;
        }

        return $user->isAdmin() || $user->id === $review->user_id;
    }

    /**
     * Determine whether the user can create reviews.
     */
    public function create(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the review.
     * Rule: Admin can always update.
     * Owner can only update if within 24 hours of creation.
     */
    public function update(User $user, Review $review): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        if ($user->id !== $review->user_id) {
            return Response::deny('Anda bukan pemilik ulasan ini.');
        }

        if ($review->isLockedForUser()) {
            return Response::deny('Ulasan ini tidak dapat diedit karena telah melewati batas waktu 24 jam.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can delete the review.
     * Rule: Admin can always delete.
     * Owner can only delete if within 24 hours of creation.
     */
    public function delete(User $user, Review $review): Response
    {
        if ($user->isAdmin()) {
            return Response::allow();
        }

        if ($user->id !== $review->user_id) {
            return Response::deny('Anda bukan pemilik ulasan ini.');
        }

        if ($review->isLockedForUser()) {
            return Response::deny('Ulasan ini tidak dapat dihapus karena telah melewati batas waktu 24 jam.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can bulk delete reviews.
     */
    public function deleteAny(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang dapat menghapus ulasan secara massal.');
    }

    /**
     * Determine whether the user can approve a review.
     */
    public function approve(User $user, Review $review): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang dapat menyetujui ulasan.');
    }

    /**
     * Determine whether the user can reject a review.
     */
    public function reject(User $user, Review $review): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang dapat menolak ulasan.');
    }

    /**
     * Determine whether the user can create a review on behalf of admin.
     */
    public function adminCreate(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang dapat membuat ulasan langsung.');
    }
}
