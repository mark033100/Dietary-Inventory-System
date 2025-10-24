<?php

namespace App\Interfaces;


interface ItemServiceInterface
{
    public function getItems();
    public function createItem(array $data);
    public function findItem($column, $value);
    public function updateItem($id, array $data);
    public function deleteItem($id);
}