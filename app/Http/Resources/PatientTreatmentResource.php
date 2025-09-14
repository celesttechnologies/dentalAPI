<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientTreatmentResource extends JsonResource {

    public function toArray(Request $request){
        return [
            'id' => $this->PatientTreatmentDoneID,
            'patient_id' => $this->PatientID,
            'patient' => "{$this->patient->Title} {$this->patient->FirstName} {$this->patient->LastName}",
            'patient_email'  => $this->patient->EmailAddress1 ?? null,
            'patient_gender' => $this->patient->Gender ?? null,
            'patient_phone'  => $this->patient->MobileNumber ?? null,
            'patient_image'   => null,
            'provider_id' => $this->ProviderID,
            'provider' => $this->doctor->ProviderName ?? null,
            'treatment_cost' => $this->TreatmentCost, // Fix typo if needed
            'treatment_balance' => $this->TreatmentBalance, // Fix typo if needed
            'treatment_payment' => $this->TreatmentPayment, // Fix typo if needed
            'treatment_date' => $this->TreatmentDate,
            'token_number'   => $this->waiting_area ? $this->waiting_area->TokenNumber : null,
            'reason'         => null,
            'apt_type'       => null,
            'completion_time' => $this->CompletionTime,
        ];
    }
}