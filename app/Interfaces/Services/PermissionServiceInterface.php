<?php

namespace App\Interfaces\Services;

interface PermissionServiceInterface
{
    public function getAllPermissions();
    public function createPermission(array $data);
    public function deletePermission($id);
    public function readUserPermissions($id);
    public function deleteUserPermission($id);

}