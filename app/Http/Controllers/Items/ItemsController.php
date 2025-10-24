<?php

namespace App\Http\Controllers\Items;

use App\Interfaces\ItemServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function __construct(
        private ItemServiceInterface $itemService
    ) {
    }

    public function getItems()
    {
        $items = $this->itemService->getItems();

        return response()->json([
            'message' => 'Items fetched successfully',
            'items' => $items
        ]);
    }

    public function findItem($column, $value)
    {
        if (!$column || !$value) {
            abort(400, 'Filter is required');
        }

        $items = $this->itemService->findItem($column, $value);

        return response()->json([
            'message' => 'Item found successfully',
            'item' => $items
        ]);
    }

    public function createItem(ItemRequest $request)
    {
        $item = $this->itemService->createItem($request->validated());

        return response()->json([
            'message' => 'Item created successfully',
            'item' => $item
        ]);
    }

    public function updateItem(Request $request, $id)
    {
        $this->itemService->updateItem($id, $request->all());

        return response()->json([
            'message' => 'Item updated successfully'
        ], 201);
    }

    public function deleteItem($id)
    {
        $this->itemService->deleteItem($id);

        return response()->json([
            'message' => 'Item deleted successfully'
        ], 200);
    }
}
