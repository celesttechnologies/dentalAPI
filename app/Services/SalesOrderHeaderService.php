<?php

namespace App\Services;

use App\Models\SalesOrderHeader; // Assuming you have a SalesOrderHeader model
use App\Http\Resources\SalesOrderHeaderResource; // Assuming you have a resource for Sales Order Header
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SalesOrderHeaderService
{
    /**
     * Get a paginated list of Sales Order Headers.
     *
     * @param int $perPage
     * @return array
     */
    public function getSalesOrderHeaders(int $perPage): array
    {
        $data = SalesOrderHeader::paginate($perPage); // Fetch paginated sales order headers

        return [
            'sales_order_headers' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                
            ]
        ];
    }

    public function createSalesOrderHeader(array $data): SalesOrderHeader
    {
        return SalesOrderHeader::create($data);
    }

    public function updateSalesOrderHeader(SalesOrderHeader $salesOrderHeader, array $data): SalesOrderHeader
    {
        $salesOrderHeader->update($data);
        $salesOrderHeader->fresh();

        return $salesOrderHeader;
    }
}