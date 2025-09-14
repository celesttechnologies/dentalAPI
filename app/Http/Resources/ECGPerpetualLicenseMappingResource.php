<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGPerpetualLicenseMappingResource extends JsonResource
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
            'clinic_license_id'     => $this->ClinicLicenseID,
            'clinic_name'           => $this->ClinicName,
            'email_address'         => $this->EmailAddress,
            'mobile_number'         => $this->MobileNumber,
            'license_key'           => $this->LicenseKey,
            'finger_print_code'     => $this->FingerPrintCode,
            'is_active'             => $this->IsActive,
            'license_valid_till'    => $this->LicenseValidTill,
            'license_last_synced_on' => $this->LicenseLastSyncedOn,
            'last_updated_on'       => $this->LastUpdatedOn,
            'last_updated_by'       => $this->LastUpdatedBy,
        ];
    }
}