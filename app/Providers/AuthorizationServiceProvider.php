<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Gates\PermissionGates;
use App\Gates\UserGates;

class AuthorizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        PermissionGates::register();
        UserGates::registerUserGates();
    }
}
