<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGMTreatmentTypeHierarchyResource extends JsonResource
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
            'treatment_type_id'           => $this->TreatmentTypeID,
            'clinic_id'                   => $this->ClinicID,
            'title'                       => $this->Title,
            'description'                 => $this->Description,
            'parent_treatment_type_id'    => $this->ParentTreatmentTypeID,
            'is_deleted'                  => $this->IsDeleted,
            'created_on'                  => $this->CreatedOn,
            'created_by'                  => $this->CreatedBy,
            'last_updated_on'             => $this->LastUpdatedOn,
            'last_updated_by'             => $this->LastUpdatedBy,
            'row_guid'                    => $this->rowguid,
            'general_treatment_cost'      => $this->GeneralTreatmentCost,
            'specialist_treatment_cost'   => $this->SpecialistTreatmentCost,
            'treatment_speciality_type_id' => $this->TreatmentSpecialityTypeID,
        ];
    }
}