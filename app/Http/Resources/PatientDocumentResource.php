<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDocumentResource extends JsonResource
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
            'patient_document_id' => $this->PatientDocumentID,
            'patient_id' => $this->PatientID,
            'document_id' => $this->DocumentID,
            'patient_treatment_id' => $this->PatientTreatmentID,
        ];
    }
}