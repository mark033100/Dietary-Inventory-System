<?php

namespace App\Interfaces\Services;

interface AdminServiceInterface
{
    public function createUser(array $data);
    public function getAllUsers();
}