<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\PermissionServiceInterface;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function __construct(
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

    public function getPermissions()
    {
        $response = $this->permissionService->getPermissions();

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

    public function assignPermissionToUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'permissions_id' => 'required|array|exists:permissions,id',
        ]);

        $response = $this->permissionService->assignPermissionToUser($request->all());

        return response()->json([
            'message' => 'Permission assigned to user successfully',
            'data' => $response
        ], 201);
    }

    public function readUserPermissions(Request $request)
    {

    }

    public function revokePermissionFromUser(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|integer|exists:users,id',
        //     'permissions_id' => 'required|array|exists:permissions,id',
        // ]);

        // $response = $this->permissionService->revokePermissionFromUser($request->all());

        // return response()->json([
        //     'message' => 'Permission revoked from user successfully',
        //     'data' => $response
        // ], 201);
    }
}
