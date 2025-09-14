<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'AppointmentID' => $this->AppointmentID,
            'StartDateTime' => $this->StartDateTime,
            'PatientName'   => $this->PatientName,
            'Status'        => $this->Status,
            'CompleteTime'  => $this->CompleteTime,
            'Provider' => [
                'ProviderID'   => $this->provider->ProviderID ?? null,
                'ProviderName' => $this->provider->ProviderName ?? 'Unknown',
            ],
        ];
    }
}
