<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDiagnosisResource extends JsonResource
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
            'id' => $this->PatientDiagnosisID,
            'patient_id' => $this->PatientID,
            'date_of_diagnosis' => $this->DateOfDiagnosis ? $this->DateOfDiagnosis->format('Y-m-d H:i:s') : null,
            'provider_id' => $this->ProviderID,
            'chief_complaint' => $this->ChiefComplaint,
            'notes' => $this->PatientDiagnosisNotes,
            'created_on' => $this->CreatedOn ? $this->CreatedOn->format('Y-m-d H:i:s') : null,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn ? $this->LastUpdatedOn->format('Y-m-d H:i:s') : null,
            'last_updated_by' => $this->LastUpdatedBy,
            'row_guid' => $this->rowguid,
        ];
    }
}