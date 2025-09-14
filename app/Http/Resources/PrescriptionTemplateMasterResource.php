<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionTemplateMasterResource extends JsonResource
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
            'prescription_template_master_id' => $this->PrescriptionTemplateMasterID,
            'prescription_template_name' => $this->PrescriptionTemplateName,
            'prescription_template_desc' => $this->PrescriptionTemplateDesc,
            'prescription_note' => $this->PrescriptionNote,
            'clinic_id' => $this->ClinicID,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}