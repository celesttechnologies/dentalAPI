<?php

namespace App\Services;

use App\Models\ItemSupplier;
use App\Http\Resources\ItemSupplierResource;

class ItemSupplierService
{
    /**
     * Get a paginated list of Item Suppliers.
     *
     * @param int $perPage
     * @return array
     */
    public function getItemSuppliers(int $perPage): array
    {
        $data = ItemSupplier::paginate($perPage);

        return [
            'suppliers' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createSupplier(array $data): ItemSupplier
    {
        return ItemSupplier::create($data);
    }

    public function updateSupplier(ItemSupplier $itemSupplier, array $data): ItemSupplier
    {
        $itemSupplier->update($data);
        $itemSupplier->fresh();

        return $itemSupplier;
    }
}