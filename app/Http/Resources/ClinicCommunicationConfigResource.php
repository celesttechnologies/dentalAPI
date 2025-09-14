<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicCommunicationConfigResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'clinic_communication_config_id' => $this->ClinicCommunicationConfigID,
            'clinic_id' => $this->ClinicID,
            'clinic_communication_master_id' => $this->ClinicCommunicationMasterID,
            'attribute_value_1' => $this->AttributeValue1,
            'attribute_value_2' => $this->AttributeValue2,
            'is_active' => $this->IsActive,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}

