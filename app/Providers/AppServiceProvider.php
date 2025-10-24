<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\{
    ItemServiceInterface,
    ItemCategoriesServiceInterface,
    UserRolesServiceInterface,
    UserServiceInterface,
    PermissionServiceInterface
};


use App\Services\Items\{ItemCategoriesService, ItemsService};
use App\Services\Admin\{UserRolesService, UserService, PermissionService};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Service Binds
        $this->app->bind(ItemServiceInterface::class, ItemsService::class);
        $this->app->bind(ItemCategoriesServiceInterface::class, ItemCategoriesService::class);
        $this->app->bind(UserRolesServiceInterface::class, UserRolesService::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
