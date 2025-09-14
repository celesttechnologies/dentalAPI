<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMedicalHistoryAttributeResource extends JsonResource
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
            'patient_medical_detail_id' => $this->PatientMedicalDetailID,
            'patient_id' => $this->PatientID,
            'medical_attributes_category' => $this->MedicalAttributesCategory,
            'medical_attributes_id' => $this->MedicalAttributesID,
            'medical_attribute_value' => $this->MedicalAttributeValue,
            'medical_attribute_text' => $this->MedicalAttributeText,
            'medical_history_date' => $this->MedicalHistoryDate,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
        ];
    }
}