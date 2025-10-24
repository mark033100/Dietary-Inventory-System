<?php

namespace App\Policies;

use App\Models\Permissions;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermissionsPolicy
{
    protected $authorizedUsers = ['ADMIN', 'SUPERADMIN'];
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->roles, $this->authorizedUsers);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool
    {
        $user = auth()->user();

        return in_array($user->roles, $this->authorizedUsers);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->roles, $this->authorizedUsers);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permissions $permissions): bool
    {
        return in_array($user->roles, $this->authorizedUsers);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return in_array($user->roles, $this->authorizedUsers);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permissions $permissions): bool
    {
        return in_array($user->roles, $this->authorizedUsers);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permissions $permissions): bool
    {
        return in_array($user->roles, $this->authorizedUsers);
    }
}
