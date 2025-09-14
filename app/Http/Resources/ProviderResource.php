<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource{
    public function toArray($request){
    return [
        'id' => $this->ProviderID,
        'clinic_id' => $this->ClinicID,
        'provider_name' => $this->ProviderName,
        'location' => $this->Location,
        'email' => $this->Email,
        'experience' => $this->Experience,
        'is_deleted' => $this->IsDeleted,
        // 'provider_image' => $this->ProviderImage,
        'phone_number' => $this->PhoneNumber,
        'sequence' => $this->Sequence,
        'attribute1' => $this->Attribute1,
        'attribute2' => $this->Attribute2,
        'attribute3' => $this->Attribute3,
        'category' => $this->Category,
        'registration_number' => $this->RegistrationNumber,
        'display_in_appointments_view' => $this->DisplayInAppointmentsView,
        'incentive_type' => $this->IncentiveType,
        'incentive_value' => $this->IncentiveValue,
        'color_code' => $this->ColorCode,
    ];
}
}