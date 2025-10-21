<?php


namespace App\Services;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Interfaces\Services\AdminServiceInterface;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Permissions;

class AdminService implements AdminServiceInterface
{

    public function createUser(array $data)
    {

        $role = $data['roles'];
        $admin = auth()->user();

        switch ($role) {
            case 'USER':
                $hasPermission = $admin->hasPermission('CAN_CREATE_USER');
                break;
            case 'ADMIN':
                $hasPermission = $admin->hasPermission('CAN_CREATE_ADMIN');
                break;
            default:
                throw new HttpException(400, 'Invalid role specified');
        }

        if (!$admin || !$hasPermission) {
            throw new HttpException(403, 'Not authorized to create user account.');
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

    public function getAllUsers()
    {
        return User::all();
    }


}