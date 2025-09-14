<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientInsuranceDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'insurance_detail_id' => $this->InsuranceDetailID, // Adjust field names as per your database
            'patient_id' => $this->PatientID,
            'insurance_provider' => $this->InsuranceProvider,
            'policy_number' => $this->PolicyNumber,
            'coverage_start_date' => $this->CoverageStartDate,
            'coverage_end_date' => $this->CoverageEndDate,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}