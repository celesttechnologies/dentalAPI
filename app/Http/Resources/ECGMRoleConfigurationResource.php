<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGMRoleConfigurationResource extends JsonResource
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
            'clinic_role_id'          => $this->ClinicRoleID,
            'role_id'                 => $this->RoleID,
            'license_module_code_csv' => $this->LicenseModuleCodeCSV,
            'is_administrator_role'   => $this->IsAdministratorRole,
            'is_active'               => $this->IsActive,
            'default_importance'      => $this->DefaultImportance,
            'created_on'              => $this->CreatedOn,
            'created_by'              => $this->CreatedBy,
            'last_updated_on'         => $this->LastUpdatedOn,
            'last_updated_by'         => $this->LastUpdatedBy,
        ];
    }
}