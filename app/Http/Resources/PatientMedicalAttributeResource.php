<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMedicalAttributeResource extends JsonResource
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
            'PatientMedicalDetailID' => $this->PatientMedicalDetailID,
            'MedicalAttributesCategory' => $this->MedicalAttributesCategory,
            'MedicalAttributesID' => $this->MedicalAttributesID,
            'MedicalAttributeValue' => $this->MedicalAttributeValue,
            'MedicalAttributeText' => $this->MedicalAttributeText,
            'MedicalHistoryDate' => $this->MedicalHistoryDate,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'LastUpdatedBy' => $this->LastUpdatedBy,
        ];
    }
}