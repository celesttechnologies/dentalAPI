<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentTypeHierarchyResource extends JsonResource{
    public function toArray($request){
    return [
        'id' => $this->TreatmentTypeID,
        'clinic_id' => $this->ClinicID,
        'title' => $this->Title,
        'description' => $this->Description,
        'parent_treatment_type_id' => $this->ParentTreatmentTypeID,
        'is_deleted' => $this->IsDeleted,
        'general_treatment_cost' => $this->GeneralTreatmentCost,
        'specialist_treatment_cost' => $this->SpecialistTreatmentCost,
        'treatment_speciality_type_id' => $this->TreatmentSpecialityTypeID,
    ];
}
}