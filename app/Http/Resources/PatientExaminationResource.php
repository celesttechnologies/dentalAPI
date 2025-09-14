<?php

namespace App\Http\Resources;

use App\Models\PatientExaminationDiagnosis;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientExaminationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'examination_id' => $this->PatientExaminationID,
            'patient_id' => $this->PatientID,
            'date_of_diagnosis' => $this->DateOfDiagnosis,
            'provider_id' => $this->ProviderID,
            'chief_complaint' => $this->ChiefComplaint,
            'patient_diagnosis_notes' => $this->PatientDiagnosisNotes,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'diagnosis' => PatientExaminationDiagnosisResource::collection($this->whenLoaded('diagnosis')),
        ];
    }
}