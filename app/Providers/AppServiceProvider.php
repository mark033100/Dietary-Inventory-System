<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\ItemRepositoryInterface;
use App\Interfaces\Services\{
    ItemServiceInterface,
    AdminServiceInterface,
    PermissionServiceInterface
};
use App\Repositories\itemRepository;
use App\Services\{
    AdminService,
    ItemService,
    PermissionService
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, itemRepository::class);
        $this->app->bind(ItemServiceInterface::class, ItemService::class);
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
