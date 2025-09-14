<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientPersonalAttributeResource extends JsonResource
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
            'patient_attribute_data_id' => $this->PatientAttributeDataID,
            'clinic_id' => $this->ClinicID,
            'patient_id' => $this->PatientID,
            'patient_attribute_id' => $this->PatientAttributeID,
            'patient_attribute_data' => $this->PatientAttributeData,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
        ];
    }
}