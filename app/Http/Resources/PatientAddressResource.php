<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->PatientId,
            'address_type' => $this->AddressType,
            'address_line1' => $this->AddressLine1,
            'address_line2' => $this->AddressLine2,
            'city' => $this->City,
            'state' => $this->State,
            'postal_code' => $this->PostalCode,
            'country' => $this->Country,
            'is_primary' => $this->IsPrimary,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
