<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientTreatmentsDoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'ID' => $this->id,
            'PatientID' => $this->PatientID,
            'PatientName'   => $this->patient->fullName,
            'PatientGender'   => $this->patient->Gender,
            'PatientMobile'   => $this->patient->MobileNumber,
            'PatientEmail'   => $this->patient->EmailAddress1 ?? null,
            'PatientImage'   => null,
            'ProviderID' => $this->ProviderID,
            'ProviderName' => $this->doctor->ProviderName ?? null,
            'TreatmentCost' => $this->TreatmentCost,
            'TreatmentDiscount' => $this->TreatmentDiscount,
            'TreatmentTax' => $this->TreatmentTax,
            'TreatmentTotalCost' => $this->TreatmentTotalCost,
            'TreatmentDate' => $this->TreatmentDate,
            'ParentPatientTreatmentDoneID' => $this->ParentPatientTreatmentDoneID,
            'TreatmentAddition' => $this->TreatmentAddition,
            'AmountToBeCollected' => $this->AmountToBeCollected,
            'TeethTreatmentNote' => $this->TeethTreatmentNote,
            'isPrimaryTooth' => $this->isPrimaryTooth,
            'Status' => $this->IsArchived == 1 ? 'completed' : 'ongoing',
        ];
        
        $treatmentType = $this->treatment_type;
        if($treatmentType) {
            $result['TreatmentType'] = [
                'ID' => $treatmentType->id,
                'TreatmentTypeID' => $treatmentType->TreatmentTypeID,
                'TreatmentSubTypeID' => $treatmentType->TreatmentSubTypeID,
                'TreatmentType' => $treatmentType->treatmentTypeHierarchy->Title ?? null,
                'TreatmentSubType' => $treatmentType->subTreatmentTypeHierarchy->Title ?? null,
                'TeethTreatment' => $treatmentType->TeethTreatment,
                'TeethTreatmentNote' => $treatmentType->TeethTreatmentNote,
                'TreatmentCost' => $treatmentType->TreatmentCost,
                'Discount' => $treatmentType->Discount,
                'Addition' => $treatmentType->Addition,
            ];
        }

        if(!empty($this->children)) {
            $result['children'] = PatientTreatmentsDoneResource::collection($this->children);
        }

        return $result;
    }
}