<?php

namespace App\Gates;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class PermissionGates
{
    protected static $authorizedRoles = ['ADMIN', 'SUPERADMIN'];

    public static function register()
    {
        Gate::define('CAN_DELETE_PERMISSION', fn(User $user) => in_array($user->roles, self::$authorizedRoles));

    }
}