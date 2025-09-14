<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesOrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sales_order_detail_id' => $this->SalesOrderDetailId,
            'sales_order_header_id' => $this->SalesOrderHeaderId,
            'item_id' => $this->ItemID,
            'quantity' => $this->Qty,
            'rate' => $this->Rate,
            'amount' => $this->Amount,
            'manufacturing_date' => $this->ManufacturingDate,
            'expiry_date' => $this->ExpiryDate,
            'batch_number' => $this->BatchNumber,
            'batch_date' => $this->BatchDate,
        ];
    }
}