<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDrugsPrescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'prescription_id' => $this->PatientDrugsPrescriptionsID,
            'patient_prescription_id' => $this->PatientPrescriptionID,
            'drug_id' => $this->DrugID,
            'frequency_id' => $this->FrequencyID,
            'dosage_id' => $this->DosageID,
            'duration' => $this->Duration,
            'drug_note' => $this->DrugNote,
        ];
    }
}