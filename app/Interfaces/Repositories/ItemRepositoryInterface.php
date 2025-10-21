<?php

namespace App\Interfaces\Repositories;

interface ItemRepositoryInterface
{
    public function fetchAllItems();
    public function fetchItemById($id);
    public function fetchItemsByCategory($category);
    public function createItem(array $data);
}