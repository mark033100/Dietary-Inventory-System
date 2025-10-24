<?php

namespace App\Gates;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class UserGates
{

    public static function registerUserGates()
    {
        Gate::define('IS_USER', fn(User $user) => true);
        Gate::define('IS_MANAGER', fn(User $user) => $user->role == 0 || $user->role == 1 || $user->role == 2);
        Gate::define('IS_ADMIN', fn(User $user) => $user->role == 0 || $user->role == 1);
        Gate::define('IS_SUPERADMIN', fn(User $user) => $user->role == 0);
    }



}