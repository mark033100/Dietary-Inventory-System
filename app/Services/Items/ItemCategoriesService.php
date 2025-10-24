<?php

namespace App\Services\Items;

use App\Interfaces\ItemCategoriesServiceInterface;
use App\Models\ItemCategories;


class ItemCategoriesService implements ItemCategoriesServiceInterface
{


    public function createItemCategory($data)
    {

        return ItemCategories::create($data);
    }

    public function getItemCategories()
    {

        return ItemCategories::all();
    }

    public function updateItemCategory($id, $data)
    {
        $category = ItemCategories::find($id);

        if (!$category) {
            abort(404, 'Item category not found');
        }
        $category->update($data);

        return $category->id;
    }

    public function deleteItemCategory($id)
    {
        $category = ItemCategories::find($id);

        if (!$category) {
            abort(404, 'Item category not found');
        }

        return $category->delete();
    }
}