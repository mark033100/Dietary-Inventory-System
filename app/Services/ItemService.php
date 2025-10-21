<?php


namespace App\Services;
use App\Interfaces\Repositories\ItemRepositoryInterface;
use Carbon\Carbon;

class ItemService
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }


    public function createItem(array $data)
    {

        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        return $this->itemRepository->createItem($data);
    }
}