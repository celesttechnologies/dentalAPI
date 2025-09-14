<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemType1Resource extends JsonResource
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
            'item_type_id' => $this->ItemTypeID, // Maps to 'ItemTypeID'
            'name' => $this->Name, // Maps to 'Name'
            'added_by' => $this->AddedBy, // Maps to 'AddedBy'
            'added_on' => $this->AddedOn, // Maps to 'AddedOn'
            'last_updated_by' => $this->LastUpdatedBy, // Maps to 'LastUpdatedBy'
            'last_updated_on' => $this->LastUpdatedOn, // Maps to 'LastUpdatedOn'
        ];
    }
}