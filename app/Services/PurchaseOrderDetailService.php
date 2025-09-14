<?php

namespace App\Services;

use App\Models\PurchaseOrderDetail; // Assuming you have a PurchaseOrderDetail model
use App\Http\Resources\PurchaseOrderDetailResource; // Assuming you have a resource for Purchase Order Detail
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PurchaseOrderDetailService
{
    /**
     * Get a paginated list of Purchase Order Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getPurchaseOrderDetails(int $perPage): array
    {
        $data = PurchaseOrderDetail::paginate($perPage); // Fetch paginated purchase order details

        return [
            'purchase_order_details' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
             
            ]
        ];
    }

    /**
     * Create a new order detail record.
     *
     * @param array $data The validated data for creating the order detail
     * @return PurchaseOrderDetail The newly created order detail model
     */
    public function createOrderDetail(array $data): PurchaseOrderDetail
    {
        return PurchaseOrderDetail::create($data);
    }

    /**
     * Update an existing order detail record.
     *
     * @param PurchaseOrderDetail $purchaseOrderDetail The order detail model to update
     * @param array $data The validated data for updating the order detail
     * @return PurchaseOrderDetail The updated order detail model
     */
    public function updateOrderDetail(PurchaseOrderDetail $purchaseOrderDetail, array $data): PurchaseOrderDetail
    {
        $purchaseOrderDetail->update($data);
        return $purchaseOrderDetail;
    }
}
