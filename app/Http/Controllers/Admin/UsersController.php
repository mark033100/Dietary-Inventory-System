<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(
        private UserServiceInterface $adminService
    ) {
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employeeid' => 'required|string|max:50',
            'password' => 'required|string|min:8',
            'roles' => 'required|string|in:ADMIN,USER'
        ]);

        $response = $this->adminService->createUser($request->all());

        return response()->json([
            'message' => 'User created successfully',
            'user' => $response
        ], 201);

    }

    public function getUsers(Request $request)
    {

        $response = $this->adminService->getUsers();

        return response()->json([
            'data' => $response
        ], 200);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'employeeid' => 'sometimes|required|string|max:50',
            'password' => 'sometimes|required|string|min:8',
            'roles' => 'sometimes|required|string|in:ADMIN,USER'
        ]);

        $response = $this->adminService->updateUser($id, $request->all());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $response
        ], 200);
    }

    public function deleteUser($id)
    {
        $response = $this->adminService->deleteUser($id);

        return response()->json([
            'message' => 'User soft deleted successfully',
            'user' => $response
        ], 200);
    }

    public function forceDeleteUser($id)
    {
        $this->adminService->forceDeleteUser($id);

        return response()->json([
            'message' => 'User permanently deleted successfully'
        ], 200);
    }

    public function pruneDeletedUsers()
    {
        $this->adminService->pruneDeletedUsers();

        return response()->json([
            'message' => 'All soft deleted users pruned successfully'
        ], 200);
    }


}
