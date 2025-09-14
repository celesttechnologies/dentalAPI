<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityInOutHeaderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'activity_type' => $this->ActivityType,
            'activity_date' => $this->ActivityDate,
            'employee_id' => $this->EmployeeId,
            'location_id' => $this->LocationId,
            'remarks' => $this->Remarks,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            'details' => ActivityInOutDetailResource::collection($this->whenLoaded('details')),
        ];
    }
}
