<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientClinicResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'client_clinic_id' => $this->ClientClinicID,
            'client_id' => $this->ClientID,
            'clinic_id' => $this->ClinicID,
        ];
    }
}