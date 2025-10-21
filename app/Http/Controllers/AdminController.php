<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Services\AdminServiceInterface;
use App\Interfaces\Services\PermissionServiceInterface;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function __construct(
        private AdminServiceInterface $adminService,
        private PermissionServiceInterface $permissionService
    ) {
    }

    public function createPermissions(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'description' => 'nullable|string',
        ]);

        $response = $this->permissionService->createPermission($request->all());

        return response()->json([
            'message' => 'Permission created successfully',
            'data' => $response
        ], 201);
    }

    public function getAllPermissions()
    {
        $response = $this->permissionService->getAllPermissions();

        return response()->json([
            'data' => $response
        ], 200);
    }

    public function deletePermission($id)
    {
        $this->permissionService->deletePermission($id);

        return response()->json([
            'message' => 'Permission deleted successfully'
        ], 200);
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


}
