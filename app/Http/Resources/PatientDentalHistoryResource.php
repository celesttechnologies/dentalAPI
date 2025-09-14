<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDentalHistoryResource extends JsonResource
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
            'id' => $this->PatientDentalHistoryID,
            'patient_id' => $this->PatientID,
            'treatment_type_id' => $this->TreatmentTypeID,
            'notes' => $this->Notes,
            'teeth_treatments' => $this->TeethTreatments,
            'is_deleted' => $this->IsDeleted,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'row_guid' => $this->rowguid,
        ];
    }
}