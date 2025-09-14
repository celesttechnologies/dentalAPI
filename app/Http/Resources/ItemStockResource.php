<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemStockResource extends JsonResource
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
            'item_stock_id' => $this->ItemStockId, // Maps to 'ItemStockId'
            'item_id' => $this->ItemId, // Maps to 'ItemId'
            'quantity' => $this->Quantity, // Maps to 'Quantity'
            'clinic_id' => $this->ClinicID, // Maps to 'ClinicID'
        ];
    }
}