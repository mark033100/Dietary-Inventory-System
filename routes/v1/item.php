<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Items\ItemCategoriesController;
use App\Http\Controllers\Items\ItemsController;


Route::middleware('auth:sanctum')->group(function () {

    Route::controller(ItemCategoriesController::class)->prefix('category')->middleware('can:IS_MANAGER')->group(function () {
        Route::get('/', 'getItemCategories')->name('items.getItemCategories');
        Route::post('/create', 'createItemCategory')->name('items.createItemCategory');
        Route::post('/update/{id}', 'updateItemCategory')->name('items.updateItemCategory');
        Route::delete('/{id}', 'deleteItemCategory')->name('items.deleteItemCategory');
    });

    Route::controller(ItemsController::class)->prefix('item')->group(function () {
        Route::get('/', 'getItems')->name('items.getItems');
        Route::get('/{column}/{value}', 'findItem')->name('items.findItem');
        Route::post('/create', 'createItem')->name('items.createItem');
        Route::post('/update/{id}', 'updateItem')->name('items.updateItem');
        Route::delete('/delete/{id}', 'deleteItem')->name('items.deleteItem')->middleware('can:IS_MANAGER');
    });

});

