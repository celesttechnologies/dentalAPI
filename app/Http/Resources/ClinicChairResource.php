<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicChairResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'chair_id' => $this->ChairID,
            'clinic_id' => $this->ClinicID,
            'title' => $this->Title,
            'description' => $this->Description,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
        ];
    }
}
