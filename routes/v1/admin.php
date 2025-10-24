<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{PermissionsController, RolesController, UsersController};


Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('can:IS_SUPERADMIN')->group(function () {

        Route::controller(PermissionsController::class)->group(function () {
            // Permissions Routes
            Route::post('/create-permission', 'createPermissions')->name('admin.createPermissions');
            Route::get('/permissions', 'getPermissions')->name('admin.getPermissions');
            Route::delete('/permission/{id}', 'deletePermission')->name('admin.deletePermission');

            // User Permission Routes
            Route::post('/assign-user-permission', 'assignPermissionToUser')->name('admin.assignPermissionToUser');
            Route::get('/user-permissions/{id}', 'readUserPermissions')->name('admin.readUserPermissions');
            Route::delete('/user-permission/{id}', 'revokePermissionFromUser')->name('admin.revokePermissionFromUser');
        });

        // User Force Delete and Prune Routes
        Route::controller(UsersController::class)->group(function () {
            Route::delete('/user-force-delete/{id}', 'forceDeleteUser')->name('admin.forceDeleteUser');
            Route::delete('/prune-deleted-users', 'pruneDeletedUsers')->name('admin.pruneDeletedUsers');
        });

        // User Role Force Delete and Prune Routes
        Route::controller(RolesController::class)->group(function () {
            Route::delete('/role-force-delete/{id}', 'forceDeleteRole')->name('admin.forceDeleteRole');
            Route::delete('/prune-deleted-roles', 'pruneDeletedRoles')->name('admin.pruneDeletedRoles');
        });
    });


    Route::middleware('can:IS_ADMIN')->group(function () {
        // User Routes
        Route::controller(UsersController::class)->group(function () {
            Route::post('/user-create', 'createUser')->name('admin.createUser');
            Route::get('/users-all', 'getUsers')->name('admin.getUsers');
            Route::put('/user-update/{id}', 'updateUser')->name('admin.updateUser');
            Route::delete('/user-delete/{id}', 'deleteUser')->name('admin.deleteUser');

        });

        // User Role Routes
        Route::controller(RolesController::class)->group(function () {
            Route::post('/create-role', 'createRole')->name('admin.createRole');
            Route::get('/roles-all', 'getRoles')->name('admin.getRoles');
            Route::delete('/role-delete/{id}', 'deleteRole')->name('admin.deleteRole');
            Route::put('/role-update/{id}', 'updateRole')->name('admin.updateRole');
        });
    });

});