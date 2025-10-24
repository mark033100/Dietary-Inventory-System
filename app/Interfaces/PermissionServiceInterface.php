<?php

namespace App\Interfaces;

interface PermissionServiceInterface
{
    public function getPermissions();
    public function createPermission(array $data);
    public function deletePermission($id);
    public function assignPermissionToUser(array $data);
    public function readUserPermissions($id);
    public function deleteUserPermission($id);

}