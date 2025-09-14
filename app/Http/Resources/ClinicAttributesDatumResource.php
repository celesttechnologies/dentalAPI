<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicAttributesDatumResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'clinic_attribute_data_id' => $this->ClinicAttributeDataID,
            'clinic_id' => $this->ClinicID,
            'attribute_name' => $this->AttributeName,
            'attribute_value' => $this->AttributeValue,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
        ];
    }
}
