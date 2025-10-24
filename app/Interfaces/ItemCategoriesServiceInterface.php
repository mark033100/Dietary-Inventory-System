<?php

namespace App\Interfaces;

interface ItemCategoriesServiceInterface
{
    public function createItemCategory($data);
    public function getItemCategories();
    public function updateItemCategory($id, $data);
    public function deleteItemCategory($id);

}