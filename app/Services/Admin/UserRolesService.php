<?php

namespace App\Services\Admin;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Interfaces\Services\UserRolesServiceInterface;
use App\Models\UserRole;
use Carbon\Carbon;

class UserRolesService implements UserRolesServiceInterface
{

    public function createRole(array $data)
    {
        $date_now = Carbon::now();

        $role = UserRole::where('name', $data['name'])->first();

        if ($role) {
            throw new HttpException(400, 'Role already exists');
        }

        $role = UserRole::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => 1,
            'created_at' => $date_now,
            'updated_at' => $date_now,
        ]);

        return $role;
    }

    public function getRoles()
    {

        return UserRole::where('status', 1)->get();
    }

    public function updateRole($id, array $data)
    {

        $role = UserRole::find($id);

        if (!$role) {
            abort(404, 'Role not found');
        }

        $role->update($data);

        return $role;
    }

    public function deleteRole($id)
    {
        $role = UserRole::find($id);

        if (!$role) {
            abort(404, 'Role not found');
        }

        $role->update([
            'status' => 0,
            'deleted_at' => Carbon::now()
        ]);

        return $role;
    }

    public function forceDeleteRole($id)
    {
        $role = UserRole::find($id);

        if (!$role) {
            abort(404, 'Role not found');
        }

        $role->delete();

        return $role;
    }

    public function pruneDeletedRoles()
    {
        \DB::table('user_roles')
            ->where('status', 0)
            ->whereNotNull('deleted_at')
            ->where('deleted_at', '<=', Carbon::now()->subDays(30))
            ->delete();
    }

}