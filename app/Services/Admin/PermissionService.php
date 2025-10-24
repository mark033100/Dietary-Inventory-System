<?php

namespace App\Services\Admin;

use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Interfaces\PermissionServiceInterface;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

use App\Models\Permissions;

class PermissionService implements PermissionServiceInterface
{
    public function getPermissions()
    {
        return Permissions::all();
    }
    public function createPermission(array $data)
    {

        Gate::authorize('create', Permissions::class);

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
        // Gate::authorize('delete', Permissions::class);
        Gate::authorize('CAN_DELETE_PERMISSION');
        return 'Permission deleted successfully';
        // $permission = Permissions::find($id);

        // if (!$permission) {
        //     throw new HttpException(404, 'Permission not found');
        // }

        // $permission->delete();

        // return true;
    }


    public function assignPermissionToUser(array $data)
    {
        $user = auth()->user();
        $hasPermission = $user->hasPermission('CAN_ASSIGN_PERMISSION_TO_USER');

        if (!$user || !$hasPermission) {
            throw new HttpException(403, 'Not authorized to assign permissions to users.');
        }

        $assignedPermissions = [];
        foreach ($data['permission_id'] as $permissionId) {
            if (!Permissions::where('id', $permissionId)->exists()) {
                throw new HttpException(404, "Permission with ID {$permissionId} not found");
            }

            $assignedPermission = Permissions::create([
                'user_id' => $data['user_id'],
                'permission_id' => $permissionId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $assignedPermissions[] = $assignedPermission;
        }

        return $assignedPermissions;
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
        Gate::authorize('CAN_DELETE_PERMISSION', Permissions::class);
        return 'Permission deleted successfully';
        // $permission = Permissions::find($id);

        // if (!$permission) {
        //     throw new HttpException(404, 'Permission not found');
        // }

        // $permission->delete();

        // return true;
    }
}