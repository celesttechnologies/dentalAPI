<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemTypeResource extends JsonResource
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
            'clinic_id' => $this->ClinicID, // Maps to 'ClinicID'
            'title' => $this->Title, // Maps to 'Title'
            'description' => $this->Description, // Maps to 'Description'
            'parent_item_type_id' => $this->ParentItemTypeID, // Maps to 'ParentItemTypeID'
            'is_deleted' => $this->IsDeleted, // Maps to 'IsDeleted'
            'created_on' => $this->CreatedOn, // Maps to 'CreatedOn'
            'created_by' => $this->CreatedBy, // Maps to 'CreatedBy'
            'last_updated_on' => $this->LastUpdatedOn, // Maps to 'LastUpdatedOn'
            'last_updated_by' => $this->LastUpdatedBy, // Maps to 'LastUpdatedBy'
            'row_guid' => $this->rowguid, // Maps to 'rowguid'
        ];
    }
}