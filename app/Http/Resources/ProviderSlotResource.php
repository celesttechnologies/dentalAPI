<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderSlotResource extends JsonResource
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
            'provider_slot_id' => $this->ProviderSlotID,
            'provider_id' => $this->ProviderID,
            'start_datetime' => $this->StartDatetime,
            'end_datetime' => $this->EndDateTime,
            'slot_interval' => $this->SlotInterval,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'row_guid' => $this->rowguid,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}