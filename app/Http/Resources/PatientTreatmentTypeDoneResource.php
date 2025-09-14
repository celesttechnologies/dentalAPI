<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientTreatmentTypeDoneResource extends JsonResource
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
            'patient_treatment_type_done_id' => $this->PatientTreatmentTypeDoneID,
            'patient_treatment_done_id' => $this->PatientTreatmentDoneID,
            'treatment_type_id' => $this->TreatmentTypeID,
            'treatment_sub_type_id' => $this->TreatmentSubTypeID,
            'teeth_treatment' => $this->TeethTreatment,
            'teeth_treatment_note' => $this->TeethTreatmentNote,
            'treatment_cost' => $this->TreatmentCost,
            'discount' => $this->Discount,
            'is_deleted' => $this->IsDeleted,
            'is_expanded' => $this->IsExpanded,
            'treatment_total_cost' => $this->TreatmentTotalCost,
            'treatment_tax' => $this->TreatmentTax,
            'addition' => $this->Addition,
            'amount_to_be_collected' => $this->AmountToBeCollected,
        ];
    }
}