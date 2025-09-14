<?php

namespace App\Services;

use App\Models\ItemCustomer;
use App\Http\Resources\ItemCustomerResource;

class ItemCustomerService
{
    /**
     * Get a paginated list of Item Customers.
     *
     * @param int $perPage
     * @return array
     */
    public function getItemCustomers(int $perPage): array
    {
        $data = ItemCustomer::paginate($perPage);

        return [
            'customers' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createCustomer(array $data): ItemCustomer
    {
        return ItemCustomer::create($data);
    }

    public function updateCustomer(ItemCustomer $itemCustomer, array $data): ItemCustomer
    {
        $itemCustomer->update($data);
        $itemCustomer->fresh();

        return $itemCustomer;
    }
}