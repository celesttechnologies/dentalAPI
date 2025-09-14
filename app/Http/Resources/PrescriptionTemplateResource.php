<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionTemplateResource extends JsonResource
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
            'prescription_template_id' => $this->PrescriptionTemplateID,
            'clinic_id' => $this->ClinicId,
            'template_name' => $this->TemplateName,
            'medicine_id' => $this->MedicineId,
            'medicine_name' => $this->MedicineName,
            'frequency_id' => $this->FrequencyId,
            'dosage' => $this->Dosage,
            'duration' => $this->Duration,
            'drug_note' => $this->DrugNote,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'prescription_template_master_id' => $this->PrescriptionTemplateMasterID,
            'frequency' => $this->Frequency,
            'sequence_order' => $this->SequenceOrder,
        ];
    }
}