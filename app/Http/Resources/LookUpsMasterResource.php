<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LookUpsMasterResource extends JsonResource
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
            'lookup_master_id' => $this->LookUpMasterID, // Maps to 'LookUpMasterID'
            'clinic_id' => $this->ClinicID, // Maps to 'ClinicID'
            'item_category' => $this->ItemCategory, // Maps to 'ItemCategory'
            'item_category_description' => $this->ItemCategoryDescription, // Maps to 'ItemCategoryDescription'
            'is_deleted' => $this->IsDeleted, // Maps to 'IsDeleted'
            'importance' => $this->Importance, // Maps to 'Importance'
            'last_updated_by' => $this->LastUpdatedBy, // Maps to 'LastUpdatedBy'
            'last_updated_on' => $this->LastUpdatedOn, // Maps to 'LastUpdatedOn'
        ];
    }
}