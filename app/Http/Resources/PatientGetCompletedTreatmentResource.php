<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientGetCompletedTreatmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->PatientTreatmentID,
            'patient_id' => $this->PatientID,
            'provider' => [
                'id' => $this->provider->ProviderID ?? null,
                'name' => $this->provider->ProviderName ?? 'Unknown',
            ],
            'teeth_treatment' => $this->TeethTreatment,
            'details' => $this->TreatmentDetails,
            'cost' => $this->TreamentCost,
            'date' => $this->TreatmentDate,
            'patient_treatments_done' => $this->patient_treatments_done ? [
                'id' => $this->patient_treatments_done->PatientTreatmentDoneID,
                'is_completed' => $this->patient_treatments_done->IsCompleted,
            ] : null,
        ];
    }
}
