<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WaitingAreaPatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->WaitingAreaID,
            'patient_id'      => $this->PatientID,
            'start_date_time' => $this->StartDateTime,
            'arrival_time'    => $this->ArrivalTime,
            'end_date_time'   => $this->EndDateTime,
            'patient_name'    => $this->PatientName,
            'patient_email'   => $this->patient->EmailAddress1 ?? null,
            'patient_gender'  => $this->patient->Gender ?? null,
            'patient_phone'   => $this->patient->MobileNumber ?? null,
            'patient_image'   => null,
            'status'          => $this->Status,
            'token_number'    => $this->TokenNumber,
            'reason'          => $this->Comment,
            'apt_type'        => null,
            'provider' => [
                'provider_id'   => $this->provider->ProviderID ?? null,
                'provider_name' => $this->provider->ProviderName ?? null,
            ],
        ];
    }
}
