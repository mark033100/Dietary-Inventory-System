<?php

namespace App\Services\Items;

use App\Interfaces\ItemServiceInterface;
use App\Models\Item;


class ItemsService implements ItemServiceInterface
{

    public function getItems()
    {
        return Item::all();
    }

    public function createItem(array $data)
    {
        return Item::create($data);
    }

    public function findItem($column, $value)
    {

        return Item::where($column, 'like', '%' . $value . '%')->get();
    }

    public function updateItem($id, array $data)
    {
        $item = Item::findOrFail($id);

        $item->update($data);
    }

    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
    }
}