<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->AppointmentID,
            'patient_id'     => $this->PatientID,
            'start_date_time' => $this->StartDateTime,
            'end_datetime' => $this->EndDateTime,
            'patient_name'   => $this->PatientName,
            'patient_gender'   => $this->PatientGender,
            'patient_mobile'   => $this->PatientPhone,
            'patient_email'   => $this->patient->EmailAddress1 ?? null,
            'patient_image'   => null,
            'status'        => $this->Status,
            'provider' => [
                'id'   => $this->provider->ProviderID ?? null,
                'name' => $this->provider->ProviderName ?? null,
            ],
        ];
    }
}
