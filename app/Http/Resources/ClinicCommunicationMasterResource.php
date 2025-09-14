<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicCommunicationMasterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'clinic_communication_master_id' => $this->ClinicCommunicationMasterID,
            'communication_master_type_id' => $this->CommunicationMasterTypeID,
            'communication_master_sub_type_id' => $this->CommunicationMasterSubTypeID,
            'communication_master_sub_type_code' => $this->CommunicationMasterSubTypeCode,
            'category' => $this->Category,
            'description' => $this->Description,
            'communication_execution_type' => $this->CommunicationExecutionType,
            'attribute1' => $this->Attribute1,
            'default_attribute_value1' => $this->DefaultAttributeValue1,
            'attribute2' => $this->Attribute2,
            'default_attribute_value2' => $this->DefaultAttributeValue2,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}
