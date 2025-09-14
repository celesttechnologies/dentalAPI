<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicLabWorkComponentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->LabWorkComponentID,
            'component_name' => $this->ComponentName,
            'component_description' => $this->ComponentDescription,
            'lab_work_cost' => $this->LabWorkCost,
            'component_category_id' => $this->ComponentCategoryID,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}