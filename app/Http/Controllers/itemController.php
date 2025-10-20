<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Repositories\ItemRepositoryInterface;

class ItemController extends Controller
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function fetchAllItems()
    {
        return response()->json($this->itemRepository->fetchAllItems());
    }

    public function fetchItemById($id)
    {
        return response()->json($this->itemRepository->fetchItemById($id));
    }

    public function fetchItemsByCategory($category)
    {
        return response()->json($this->itemRepository->fetchItemsByCategory($category));
    }
}
