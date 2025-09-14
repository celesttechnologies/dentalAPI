<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientOngoingTreatmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->PatientTreatmentID,
            'patient_id' => $this->PatientID,
            'treatment_type_id' => $this->TreatmentTypeID,
            'provider' => [
                'id' => $this->provider->ProviderID ?? null,
                'name' => $this->provider->ProviderName ?? 'Unknown',
            ],
            'teeth_treatment' => $this->TeethTreatment,
            'details' => $this->TreatmentDetails,
            'cost' => $this->TreamentCost,
            'date' => $this->TreatmentDate,
        ];
    }
}