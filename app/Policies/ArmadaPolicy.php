<?php

namespace App\Policies;

use App\Models\Armada;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArmadaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any armadas.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the armada.
     */
    public function view(?User $user, Armada $armada): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create armadas.
     */
    public function create(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang memiliki izin untuk menambahkan armada.');
    }

    /**
     * Determine whether the user can update the armada.
     */
    public function update(User $user, Armada $armada): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang memiliki izin untuk mengubah armada.');
    }

    /**
     * Determine whether the user can delete the armada.
     */
    public function delete(User $user, Armada $armada): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang memiliki izin untuk menghapus armada.');
    }

    /**
     * Determine whether the user can restore the armada.
     */
    public function restore(User $user, Armada $armada): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang memiliki izin untuk memulihkan armada.');
    }

    /**
     * Determine whether the user can permanently delete the armada.
     */
    public function forceDelete(User $user, Armada $armada): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang memiliki izin untuk menghapus permanen armada.');
    }
}
