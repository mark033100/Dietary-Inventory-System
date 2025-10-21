<?php

namespace App\Services;

use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Interfaces\Services\PermissionServiceInterface;
use Carbon\Carbon;

use App\Models\Permissions;

class PermissionService implements PermissionServiceInterface
{
    public function getAllPermissions()
    {
        return Permissions::all();
    }

    public function createPermission(array $data)
    {

        $admin = auth()->user();
        $hasPermission = $admin->hasPermission('CAN_CREATE_PERMISSION');

        if (!$admin || !$hasPermission) {
            throw new HttpException(403, 'Not authorized to create user permissions.');
        }

        if (Permissions::where('name', $data['name'])->exists()) {
            throw new HttpException(400, 'Permission already exists');
        }

        $result = Permissions::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $result;
    }

    public function deletePermission($id)
    {
        $admin = auth()->user();
        $hasPermission = $admin->hasPermission('CAN_DELETE_PERMISSION');

        if (!$admin || !$hasPermission) {
            throw new HttpException(403, 'Not authorized to delete permissions.');
        }

        $permission = Permissions::find($id);

        if (!$permission) {
            throw new HttpException(404, 'Permission not found');
        }

        $permission->delete();

        return true;
    }


    public function addUserPermission(array $data)
    {
        // Implementation for adding a permission to a user
    }

    public function readUserPermissions($id)
    {
        $permissions = Permissions::where('user_id', $id)->get();

        if ($permissions->isEmpty()) {
            throw new HttpException(404, 'Permissions not found');
        }

        return $permissions;
    }

    public function deleteUserPermission($id)
    {
        $admin = auth()->user();
        $hasPermission = $admin->hasPermission('CAN_DELETE_PERMISSION');

        if (!$admin || !$hasPermission) {
            throw new HttpException(403, 'Not authorized to delete user permissions.');
        }

        $permission = Permissions::find($id);

        if (!$permission) {
            throw new HttpException(404, 'Permission not found');
        }

        $permission->delete();

        return true;
    }
}