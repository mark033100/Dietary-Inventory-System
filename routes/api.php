<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Permissions;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->name('v1.')->group(base_path('routes/v1/item.php'));

Route::prefix('v1')->name('v1.')->group(base_path('routes/v1/admin.php'));

Route::get('/test', function () {

    return Permissions::all();
});