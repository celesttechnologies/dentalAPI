<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcgExternalRefferalMasterResource extends JsonResource
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
            'external_referral_master_id' => $this->ExternalRefferalMasterId,
            'clinic_id'                   => $this->ClinicId,
            'referral_name'               => $this->RefferalName,
            'mobile_number'               => $this->MobileNumber,
            'country_dial_code'          => $this->CountryDialCode,
            'description'                 => $this->Description,
            'email_id'                    => $this->EmailId,
            'is_deleted'                  => $this->IsDeleted,
            'created_by'                  => $this->CreatedBy,
            'created_on'                  => $this->CreatedOn,
            'last_updated_on'             => $this->LastUpdatedOn,
            'last_updated_by'             => $this->LastUpdatedBy,
        ];
    }
}