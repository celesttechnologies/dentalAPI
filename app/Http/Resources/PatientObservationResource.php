<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientObservationResource extends JsonResource
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
            'patient_observation_id' => $this->PatientObservationID,
            'patient_id' => $this->PatientID,
            'treatment_type_id' => $this->TreatmentTypeID,
            'date_of_history' => $this->DateOfHistroy,
            'description' => $this->Description,
            'teeth_treatments' => $this->TeethTreatments,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'provider_id' => $this->ProviderID,
            'rowguid' => $this->rowguid,
        ];
    }
}