<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewItem;
use Illuminate\Http\Request;
use App\Interfaces\Repositories\ItemRepositoryInterface;
use App\Services\ItemService;

class ItemController extends Controller
{
    protected $itemRepository;
    protected $itemService;

    public function __construct(ItemRepositoryInterface $itemRepository, ItemService $itemService)
    {
        $this->itemRepository = $itemRepository;
        $this->itemService = $itemService;
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

    public function createItem(StoreNewItem $request)
    {
        $data = $request->validated();
        $item = $this->itemService->createItem($data);

        if (!$item) {
            return response()->json([
                'message' => 'Failed to create item'
            ], 500);
        }

        return response()->json([
            'message' => 'Item created successfully'
        ], 201);
    }
}
