<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang dapat melihat daftar pengguna.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): Response
    {
        return ($user->isAdmin() || $user->id === $model->id)
            ? Response::allow()
            : Response::deny('Anda tidak memiliki izin untuk melihat profil ini.');
    }

    /**
     * Determine whether the user can create users.
     */
    public function create(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('Hanya admin yang dapat menambahkan pengguna baru.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        return ($user->isAdmin() || $user->id === $model->id)
            ? Response::allow()
            : Response::deny('Anda tidak memiliki izin untuk mengubah profil ini.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        if (! $user->isAdmin()) {
            return Response::deny('Hanya admin yang dapat menghapus pengguna.');
        }

        if ($user->id === $model->id) {
            return Response::deny('Anda tidak dapat menghapus akun Anda sendiri.');
        }

        return Response::allow();
    }
}
