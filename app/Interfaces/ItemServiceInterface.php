<?php

namespace App\Interfaces;


interface ItemServiceInterface
{
    public function getItems($id);
    public function createItem(array $data);
    public function findItem($id);
    public function updateItem($id, array $data);
    public function deleteItem($id);
}