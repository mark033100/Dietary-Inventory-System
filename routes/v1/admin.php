<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::middleware('auth:sanctum')->group(function () {

    // Permissions Routes
    Route::post('/create-permission', [AdminController::class, 'createPermissions'])->name('admin.createPermissions');
    Route::get('/permissions-all', [AdminController::class, 'getAllPermissions'])->name('admin.getAllPermissions');
    Route::delete('/permission/{id}', [AdminController::class, 'deletePermission'])->name('admin.deletePermission');

    // User Permission Routes
    Route::post('/add-user-permission', [AdminController::class, 'addUserPermission'])->name('admin.addUserPermission');
    Route::get('/user-permissions/{id}', [AdminController::class, 'readUserPermissions'])->name('admin.readUserPermissions');
    Route::delete('/user-permission/{id}', [AdminController::class, 'deleteUserPermission'])->name('admin.deleteUserPermission');

    // User Routes
    Route::post('/admin-create', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');
    Route::post('/user-create', [AdminController::class, 'createUser'])->name('admin.createUser');
});