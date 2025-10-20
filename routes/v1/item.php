<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;



Route::get('/items-all', [ItemController::class, 'fetchAllItems'])->name('items.fetchAllItems');
Route::get('/items/{id}', [ItemController::class, 'fetchItemById'])->name('items.fetchItemById');
Route::get('/items/category/{category}', [ItemController::class, 'fetchItemsByCategory'])->name('items.fetchItemsByCategory');
