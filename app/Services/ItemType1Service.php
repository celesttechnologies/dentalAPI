<?php

namespace App\Services;

use App\Models\ItemType1;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ItemType1Resource;

class ItemType1Service
{
    /**
     * Get a paginated list of Item Types.
     *
     * @param int $perPage
     * @return array
     */
    public function getItemTypes(int $perPage): array
    {
        $data = ItemType1::paginate($perPage);

        return [
            'types' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new item type record.
     *
     * @param array $data The validated data for creating the item type
     * @return ItemType1 The newly created item type model
     */
    public function createItemType(array $data): ItemType1
    {
        return ItemType1::create($data);
    }

    /**
     * Update an existing item type record.
     *
     * @param ItemType1 $itemType1 The item type model to update
     * @param array $data The validated data for updating the item type
     * @return ItemType1 The updated item type model
     */
    public function updateItemType(ItemType1 $itemType1, array $data): ItemType1
    {
        $itemType1->update($data);
        return $itemType1;
    }
}