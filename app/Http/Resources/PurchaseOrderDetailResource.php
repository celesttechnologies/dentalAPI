<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderDetailResource extends JsonResource
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
            'purchase_order_detail_id' => $this->PurchaseOrderDetailId,
            'purchase_order_header_id' => $this->PurchaseOrderHeaderId,
            'purchase_order_header' => new PurchaseOrderHeaderResource($this->purchaseOrderHeader),
            'item_id' => $this->ItemID,
            'item' => new ItemResource($this->item),
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