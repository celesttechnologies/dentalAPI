<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcgExternalRefferalDatumResource extends JsonResource
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
            'external_referral_data_id'   => $this->ExternalRefferalDataId,
            'external_referral_master_id'  => $this->ExternalRefferalMasterId,
            'patient_id'                   => $this->PatientId,
            'clinic_id'                    => $this->ClinicId,
            'is_deleted'                   => $this->IsDeleted,
            'created_by'                   => $this->CreatedBy,
            'created_on'                   => $this->CreatedOn,
            'last_updated_on'              => $this->LastUpdatedOn,
            'last_updated_by'              => $this->LastUpdatedBy,
        ];
    }
}