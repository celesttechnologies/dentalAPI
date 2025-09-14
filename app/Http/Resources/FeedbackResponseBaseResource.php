<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResponseBaseResource extends JsonResource
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
            'feedback_id' => $this->FeedbackID,
            'clinic_id' => $this->ClinicID,
            'patient_id' => $this->PatientID,
            'provider_id' => $this->ProviderID,
            'patient_name' => $this->PatientName,
            'mobile_number' => $this->MobileNumber,
            'date_of_feedback' => $this->DateOfFeedBack,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'updated_by' => $this->UpdatedBy,
            'updated_on' => $this->UpdatedOn,
            'status' => $this->Status,
        ];
    }
}