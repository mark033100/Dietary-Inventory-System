<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\Services\UserRolesServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct(
        private UserRolesServiceInterface $userRolesService,
    ) {
    }
    public function createRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:user_roles,name',
            'description' => 'nullable|string',
        ]);

        $response = $this->userRolesService->createRole($request->all());

        return response()->json([
            'message' => 'Role created successfully',
            'data' => $response
        ], 201);
    }

    public function getRoles()
    {
        $response = $this->userRolesService->getRoles();

        return response()->json([
            'data' => $response
        ], 200);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|unique:user_roles,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $response = $this->userRolesService->updateRole($id, $request->all());  //update role

        return response()->json([
            'message' => 'Role updated successfully',
            'data' => $response
        ], 200);
    }

    public function deleteRole($id)
    {
        $this->userRolesService->deleteRole($id);

        return response()->json([
            'message' => 'Role soft deleted successfully'
        ], 200);
    }

    public function forceDeleteRole($id)
    {
        $this->userRolesService->forceDeleteRole($id);

        return response()->json([
            'message' => 'Role permanently deleted successfully'
        ], 200);
    }
}
