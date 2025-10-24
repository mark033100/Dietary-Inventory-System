<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\ItemRepositoryInterface;
use App\Interfaces\Services\{
    ItemServiceInterface,
    UserRolesServiceInterface,
    UserServiceInterface,
    PermissionServiceInterface
};
use App\Repositories\itemRepository;
use App\Services\ItemService;
use App\Services\Admin\{UserRolesService, UserService, PermissionService};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, itemRepository::class);
        $this->app->bind(ItemServiceInterface::class, ItemService::class);
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
