<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientNoteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->PatientNoteID ?? $this->id,
            'patient_id' => $this->PatientID,
            'note' => $this->Note,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
        ];
    }
}
