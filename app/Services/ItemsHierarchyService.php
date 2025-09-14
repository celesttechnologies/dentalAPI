<?php

namespace App\Services;

use App\Models\ItemsHierarchy;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ItemsHierarchyResource;

class ItemsHierarchyService
{
    /**
     * Get a paginated list of Items Hierarchy.
     *
     * @param int $perPage
     * @return array
     */
    public function getItemsHierarchy(int $perPage): array
    {
        $data = ItemsHierarchy::paginate($perPage);

        return [
            'hierarchy' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new items hierarchy record.
     *
     * @param array $data The validated data for creating the items hierarchy
     * @return ItemsHierarchy The newly created items hierarchy model
     */
    public function createHierarchy(array $data): ItemsHierarchy
    {
        return ItemsHierarchy::create($data);
    }

    /**
     * Update an existing items hierarchy record.
     *
     * @param ItemsHierarchy $itemsHierarchy The items hierarchy model to update
     * @param array $data The validated data for updating the items hierarchy
     * @return ItemsHierarchy The updated items hierarchy model
     */
    public function updateHierarchy(ItemsHierarchy $itemsHierarchy, array $data): ItemsHierarchy
    {
        $itemsHierarchy->update($data);
        return $itemsHierarchy;
    }
}