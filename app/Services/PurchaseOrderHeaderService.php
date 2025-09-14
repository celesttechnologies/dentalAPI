<?php

namespace App\Services;

use App\Models\PurchaseOrderHeader; // Assuming you have a PurchaseOrderHeader model
use App\Http\Resources\PurchaseOrderHeaderResource; // Assuming you have a resource for Purchase Order Header
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PurchaseOrderHeaderService
{
    /**
     * Get a paginated list of Purchase Order Headers.
     *
     * @param int $perPage
     * @return array
     */
    public function getPurchaseOrderHeaders(int $perPage): array
    {
        $data = PurchaseOrderHeader::paginate($perPage); // Fetch paginated purchase order headers

        return [
            'purchase_order_headers' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    public function createPurchaseOrderHeader($data): PurchaseOrderHeader
    {
        return PurchaseOrderHeader::create($data); // Create a new purchase order header
    }

    public function updatePurchaseOrderHeader($purchaseOrderHeader, $data): PurchaseOrderHeader
    {
        $purchaseOrderHeader->update($data); // Update the purchase order header with the new data
        $purchaseOrderHeader->fresh();

        return $purchaseOrderHeader; // Return the updated purchase order header
    }
}