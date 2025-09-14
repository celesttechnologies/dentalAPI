<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailSituationResource extends JsonResource
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
            'id' => $this->EmailSituationID,
            'situation_code' => $this->SitutationCode,
            'situation_description' => $this->SituationDescription,
            'detailed_triggering_description' => $this->DetailedTrigerringDeescription,
            'situation_type' => $this->SituationType,
            'dependent_field_1' => $this->DependentField1,
            'dependent_field_2' => $this->DependentField2,
            'dependent_field_3' => $this->DependentField3,
            'dependent_field_4' => $this->DependentField4,
            'is_active' => $this->IsActive,
            'is_deleted' => $this->isDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}