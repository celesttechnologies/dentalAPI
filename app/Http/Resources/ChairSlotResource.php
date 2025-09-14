<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChairSlotResource extends JsonResource
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
            'chair_slot_id' => $this->ChairSlotID,
            'chair_id' => $this->ChairID,
            'start_datetime' => $this->StartDatetime,
            'end_datetime' => $this->EndDateTime,
            'slot_interval' => $this->SlotInterval,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}