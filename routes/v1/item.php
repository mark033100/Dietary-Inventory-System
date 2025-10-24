<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Items\ItemCategoriesController;
use App\Http\Controllers\Items\ItemsController;


Route::middleware(['auth:sanctum', 'can:IS_MANAGER'])->group(function () {

    Route::controller(ItemCategoriesController::class)->prefix('category')->group(function () {
        Route::get('/', 'getItemCategories')->name('items.getItemCategories');
        Route::post('/create', 'createItemCategory')->name('items.createItemCategory');
        Route::post('/update/{id}', 'updateItemCategory')->name('items.updateItemCategory');
        Route::delete('/{id}', 'deleteItemCategory')->name('items.deleteItemCategory');
    });

    Route::controller(ItemsController::class)->group(function () {

    });

});

