<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientTreatmentsPlanDetailResource extends JsonResource
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
            'ID' => $this->id,
            'TreatmentTypeID' => $this->TreatmentTypeID,
            'TreatmentSubTypeID' => $this->TreatmentSubTypeID,
            'TeethTreatment' => $this->TeethTreatment,
            'TeethTreatmentNote' => $this->TeethTreatmentNote,
            'TreatmentCost' => $this->TreatmentCost,
            'Discount' => $this->Discount,
            'IsDeleted' => $this->IsDeleted,
            'IsExpanded' => $this->IsExpanded,
            'TreatmentTotalCost' => $this->TreatmentTotalCost,
            'TreatmentTax' => $this->TreatmentTax,
            'Addition' => $this->Addition,
        ];
    }
}