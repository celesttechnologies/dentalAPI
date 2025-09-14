<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'item_id' => $this->ItemID,
            'clinic_id' => $this->ClinicID,
            'item_type_id' => $this->ItemTypeID,
            'item_type' => $this->itemType ? $this->itemType->Title : null,
            'item_name' => $this->ItemName,
            'manufacturer' => $this->Manufacturer,
            'description' => $this->Description,
            'measure' => $this->Measure,
            'unit_of_measure' => $this->UnitOfMeasure,
            'internal_prescription' => $this->InternalPrescription,
            'minimum_quantity' => $this->MinimumQuantity,
            'maximum_quantity' => $this->MaximumQuantity,
            'reorder_quantity' => $this->ReorderQuantity,
            'rate' => $this->Rate,
            'added_by' => $this->AddedBy,
            'added_on' => $this->AddedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'is_deleted' => $this->IsDeleted,
            'row_guid' => $this->rowguid,
            'location' => $this->Location,
            'shelflife' => $this->Shelflife,
        ];
    }
}