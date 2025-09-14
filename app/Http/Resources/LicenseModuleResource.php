<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LicenseModuleResource extends JsonResource
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
            'license_module_id' => $this->LicenseModuleID, // Maps to 'LicenseModuleID'
            'module_code' => $this->ModuleCode, // Maps to 'ModuleCode'
            'module_name' => $this->ModuleName, // Maps to 'ModuleName'
            'module_description' => $this->ModuleDescription, // Maps to 'ModuleDescription'
            'order_number' => $this->OrderNumber, // Maps to 'OrderNumber'
            'prerequisites' => $this->PreRequisitesCSV, // Maps to 'PreRequisitesCSV'
            'created_on' => $this->CreatedOn, // Maps to 'CreatedOn'
            'created_by' => $this->CreatedBy, // Maps to 'CreatedBy'
        ];
    }
}