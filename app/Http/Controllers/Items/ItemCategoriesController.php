<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Interfaces\ItemCategoriesServiceInterface;
use Illuminate\Http\Request;

class ItemCategoriesController extends Controller
{
    public function __construct(
        private ItemCategoriesServiceInterface $itemCategoriesService
    ) {
    }

    public function createItemCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:item_categories,name',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $category = $this->itemCategoriesService->createItemCategory($data);

        return response()->json([
            'message' => 'Item category created successfully',
            'category' => $category
        ], 201);
    }

    public function getItemCategories()
    {
        return response()->json($this->itemCategoriesService->getItemCategories(), 200);
    }

    public function updateItemCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:item_categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = $this->itemCategoriesService->updateItemCategory($id, $validated);

        return response()->json([
            'message' => 'Item category updated successfully',
            'category id' => $category
        ]);
    }


    public function deleteItemCategory($id)
    {
        $this->itemCategoriesService->deleteItemCategory($id);

        return response()->json([
            'message' => 'Item category deleted successfully'
        ], 200);
    }

}
