<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicAttributesMasterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'clinic_attribute_master_id' => $this->ClinicAttributeMasterID,
            'attribute_name' => $this->AttributeName,
            'attribute_description' => $this->AttributeDescription,
            'importance' => $this->Importance,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'rowguid' => $this->rowguid,
        ];
    }
}
