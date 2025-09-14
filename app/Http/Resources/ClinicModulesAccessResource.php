<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicModulesAccessResource extends JsonResource
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
            'id' => $this->ClinicModuleAccessID,
            'clinic_id' => $this->ClinicID,
            'license_module_id' => $this->LicenseModuleID,
            'module_code' => $this->ModuleCode,
            'is_licensed' => $this->IsLicensed,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'row_guid' => $this->rowguid,
        ];
    }
}