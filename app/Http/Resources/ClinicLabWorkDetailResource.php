<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicLabWorkDetailResource extends JsonResource
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
            'id' => $this->LabWorkDetailID,
            'lab_work_id' => $this->LabWorkID,
            'lab_work_component' => new ClinicLabWorkComponentResource($this->clinic_lab_work_component),
            'selected_teeth' => $this->SelectedTeeth,
            'lab_work_component_cost' => $this->LabWorkComponentCost,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}