<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SMSSituationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'SMSSituationID' => $this->SMSSituationID,
            'SitutationCode' => $this->SitutationCode,
            'SituationDescription' => $this->SituationDescription,
            'DetailedTrigerringDeescription' => $this->DetailedTrigerringDeescription,
            'SituationType' => $this->SituationType,
            'DependentField1' => $this->DependentField1,
            'DependentField2' => $this->DependentField2,
            'DependentField3' => $this->DependentField3,
            'DependentField4' => $this->DependentField4,
            'IsActive' => $this->IsActive,
            'isDeleted' => $this->isDeleted,
            'CreatedOn' => $this->CreatedOn,
            'CreatedBy' => $this->CreatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn,
            'LastUpdatedBy' => $this->LastUpdatedBy,
        ];
    }
}
