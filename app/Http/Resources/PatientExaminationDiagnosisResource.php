<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientExaminationDiagnosisResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'diagnosis_id' => $this->PatientExaminationDiagnosisID,
            'treatment_type' => [
                'id' => $this->TreatmentTypeID,
                'title' => $this->treatmentType->Title,
                'description' => $this->treatmentType->Description,
            ],
            'description' => $this->Description,
            'teeth_treatments' => $this->TeethTreatments,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}