<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMedicalCertificateResource extends JsonResource
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
            'patient_medical_certificate_id' => $this->PatientMedicalCertificateID,
            'patient_id' => $this->PatientID,
            'provider_id' => $this->ProviderID,
            'date_from' => $this->DateFrom,
            'date_to' => $this->DateTo,
            'reason' => $this->Reason,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
            'out_patient_on' => $this->OutPatientOn,
            'in_patient_from' => $this->InPatientFrom,
            'in_patient_to' => $this->InPatientTo,
            'certificate_type_id' => $this->CertificateTypeID,
        ];
    }
}