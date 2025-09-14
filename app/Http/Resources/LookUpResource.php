<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LookUpResource extends JsonResource
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
            'id' => $this->id, // Maps to 'id'
            'item_id' => $this->ItemID, // Maps to 'ItemID'
            'item_title' => $this->ItemTitle, // Maps to 'ItemTitle'
            'item_description' => $this->ItemDescription, // Maps to 'ItemDescription'
            'item_category' => $this->ItemCategory, // Maps to 'ItemCategory'
        ];
    }
}