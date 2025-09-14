<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserOriginalResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'user_id' => $this->UserID,
            'clinic_id' => $this->ClinicID,
            'provider_id' => $this->ProviderID,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}
