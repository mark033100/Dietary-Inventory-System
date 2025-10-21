<?php

namespace App\Repositories;
use App\Interfaces\Repositories\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{

    public function fetchAllItems()
    {
        return Item::all();
    }

    public function fetchItemById($id)
    {
        return Item::find($id);
    }

    public function fetchItemsByCategory($category)
    {
        return Item::where('category', $category)->get();
    }

    public function createItem(array $data)
    {
        return Item::create($data);
    }
}