<?php

namespace App\Interfaces;


interface UserServiceInterface
{
    public function createUser(array $data);
    public function getUsers();
    public function updateUser($id, array $data);
    public function deleteUser($id);
    public function forceDeleteUser($id);
    public function pruneDeletedUsers();
}