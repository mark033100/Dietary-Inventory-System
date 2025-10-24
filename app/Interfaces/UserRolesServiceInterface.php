<?php

namespace App\Interfaces;

interface UserRolesServiceInterface
{
    public function createRole(array $data);
    public function getRoles();
    public function updateRole($id, array $data);
    public function deleteRole($id);
    public function forceDeleteRole($id);
    public function pruneDeletedRoles();
}