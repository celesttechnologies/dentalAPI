<?php

namespace App\Services;

use App\Models\ItemType;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ItemTypeResource;

class ItemTypeService
{
    /**
     * Get a paginated list of Item Types.
     *
     * @param int $perPage
     * @return array
     */
    public function getItemTypes(int $perPage): array
    {
        $data = ItemType::paginate($perPage);

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
     * @return ItemType The newly created item type model
     */
    public function createItemType(array $data): ItemType
    {
        return ItemType::create($data);
    }

    /**
     * Update an existing item type record.
     *
     * @param ItemType $itemType The item type model to update
     * @param array $data The validated data for updating the item type
     * @return ItemType The updated item type model
     */
    public function updateItemType(ItemType $itemType, array $data): ItemType
    {
        $itemType->update($data);
        return $itemType;
    }
}
