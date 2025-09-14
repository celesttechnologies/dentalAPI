<?php

namespace App\Services;

use App\Models\SalesOrderDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\SalesOrderDetailResource;

class SalesOrderDetailService
{
    /**
     * Get a paginated list of Sales Order Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getSalesOrderDetails(int $perPage): array
    {
        $data = SalesOrderDetail::paginate($perPage); // Fetch paginated sales order details

        return [
            'sales_order_details' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                
            ]
        ];
    }

    /**
     * Create a new sales order detail record.
     *
     * @param array $data The validated data for creating the sales order detail
     * @return SalesOrderDetail The newly created sales order detail model
     */
    public function createSalesOrderDetail(array $data): SalesOrderDetail
    {
        return SalesOrderDetail::create($data);
    }

    /**
     * Update an existing sales order detail record.
     *
     * @param SalesOrderDetail $salesOrderDetail The sales order detail model to update
     * @param array $data The validated data for updating the sales order detail
     * @return SalesOrderDetail The updated sales order detail model
     */
    public function updateSalesOrderDetail(SalesOrderDetail $salesOrderDetail, array $data): SalesOrderDetail
    {
        $salesOrderDetail->update($data);
        return $salesOrderDetail;
    }
}