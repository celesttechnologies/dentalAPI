<?php

namespace App\Services;

use App\Models\ItemStock;
use App\Http\Resources\ItemStockResource;

class ItemStockService
{
    /**
     * Get a paginated list of Item Stocks.
     *
     * @param int $perPage
     * @return array
     */
    public function getItemStocks(int $perPage): array
    {
        $data = ItemStock::paginate($perPage);

        return [
            'stocks' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createStock(array $data): ItemStock
    {
        return ItemStock::create($data);
    }

    public function updateStock(ItemStock $itemStock, array $data): ItemStock
    {
        $itemStock->update($data);
        $itemStock->fresh();

        return $itemStock;
    }
}