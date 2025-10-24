<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;


class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->roles == 'ADMIN' || $user->roles == 'SUPERADMIN'
            ? response::allow()
            : response::deny('You do not have permission to Create a user.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->roles == 'ADMIN' || $user->roles == 'SUPERADMIN'
            ? response::allow()
            : response::deny('You do not have permission to Create a user.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        return $user->roles == 'ADMIN' || $user->roles == 'SUPERADMIN'
            ? response::allow()
            : response::deny('You do not have permission to Update a user.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        return $user->roles == 'ADMIN' || $user->roles == 'SUPERADMIN'
            ? response::allow()
            : response::deny('You do not have permission to Delete a user.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->roles == 'ADMIN' || $user->roles == 'SUPERADMIN';
    }

}
