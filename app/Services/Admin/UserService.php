<?php

namespace App\Services\Admin;

use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Carbon\Carbon;



class UserService implements UserServiceInterface
{

    public function createUser(array $data)
    {

        $role = $data['roles'];

        switch ($role) {
            case 'USER':
                Gate::authorize('IS_ADMIN');
                break;
            case 'ADMIN':
                Gate::authorize('IS_SUPERADMIN');
                break;
            default:
                throw new HttpException(400, 'Invalid role specified');
        }

        $date_now = Carbon::now();

        $user = User::where('name', $data['name'])->first();

        if ($user) {
            throw new HttpException(400, 'User already exists');
        }

        $user = User::create([
            'name' => $data['name'],
            'employeeid' => $data['employeeid'],
            'password' => Hash::make($data['password']),
            'roles' => $data['roles'],
            'created_at' => $date_now,
            'updated_at' => $date_now,
        ]);

        return $user;
    }

    public function getUsers()
    {
        return User::query()
            ->whereStatus('ACTIVE')
            ->whereNot('roles', 'SUPERADMIN')
            ->get();
    }

    public function updateUser($id, array $data)
    {
        $user = User::find($id);

        if ($user->roles == 'ADMIN' || $user->roles == 'SUPERADMIN') {
            Gate::authorize('IS_SUPERADMIN');
        }

        if (!$user) {
            abort(404, 'User not found');
        }

        $user->update($data);

        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->isSuperAdmin()) {
            abort(403, 'Cannot delete SUPERADMIN user');
        }

        if ($user->isAdmin()) {
            Gate::authorize('IS_SUPERADMIN');
        }

        $user->update([
            'status' => 'DELETED',
            'deleted_at' => Carbon::now()
        ]);

        return $user;
    }

    public function forceDeleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->isSuperAdmin()) {
            abort(403, 'Cannot delete SUPERADMIN user');
        }

        if ($user->isAdmin()) {
            Gate::authorize('IS_SUPERADMIN');
        }

        $user->delete();

        return $user;
    }

    public function pruneDeletedUsers()
    {
        $deletedUsers = User::where('status', 'DELETED')
            ->whereNotNull('deleted_at')
            ->where('deleted_at', '<=', Carbon::now()->subDays(30))
            ->get();

        foreach ($deletedUsers as $user) {
            $user->delete();
        }
    }
}