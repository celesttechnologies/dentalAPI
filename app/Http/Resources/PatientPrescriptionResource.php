<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientPrescriptionResource extends JsonResource
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
            'patient_prescription_id' => $this->PatientPrescriptionID,
            'patient_id' => $this->PatientID,
            'provider_id' => $this->ProviderID,
            'prescription_note' => $this->PrescriptionNote,
            'date_of_prescription' => $this->DateOfPrescription,
            'next_follow_up' => $this->NextFollowUp,
            'investigation_advised_ids' => $this->InvestigationAdvisedIDCSV,
            'patient_investigation_id' => $this->PatientInvestigationID,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
            'is_followup_sms_required' => $this->IsFolloupSMSRequired,
        ];
    }
}