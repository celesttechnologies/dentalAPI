<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientCommunicationGroupResource extends JsonResource
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
            'name' => $this->Name,
            'description' => $this->Description,
            'is_active' => $this->IsActive,
            'clinic_id' => $this->ClinicId,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            'patients' => $this->whenLoaded('patients'),
        ];
    }
}
