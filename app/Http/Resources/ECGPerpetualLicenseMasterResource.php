<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGPerpetualLicenseMasterResource extends JsonResource
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
            'license_id'            => $this->ECGLicenseID,
            'license_key'           => $this->LicenseKey,
            'license_type_id'       => $this->LicenseTypeID,
            'license_created_date'  => $this->LicenseCreatedDate,
            'license_activated_on'  => $this->LicenseActivatedOn,
            'license_validity_type_id' => $this->LicenseValidityTypeID,
            'license_deactivated_on' => $this->LicenseDeactivatedOn,
            'last_updated_on'       => $this->LastUpdatedOn,
            'last_updated_by'       => $this->LastUpdatedBy,
        ];
    }
}