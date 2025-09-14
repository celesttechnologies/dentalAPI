<?php

namespace App\Services;

use App\Models\Item;
use App\Http\Resources\ItemResource;

class ItemService
{
    /**
     * Get a paginated list of Items.
     *
     * @param int $perPage
     * @return array
     */
    public function getItems(int $perPage): array
    {
        $data = Item::paginate($perPage);

        return [
            'items' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createItem(array $data): Item
    {
        return Item::create($data);
    }

    public function updateItem(Item $item, array $data): Item
    {
        $item->update($data);
        $item->fresh();

        return $item;
    }
}