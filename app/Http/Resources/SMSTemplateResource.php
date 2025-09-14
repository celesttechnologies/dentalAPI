<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SMSTemplateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'SMSTemplateID' => $this->SMSTemplateID,
            'ClinicID' => $this->ClinicID,
            'SituationID' => $this->SituationID,
            'SMSCategoryID' => $this->SMSCategoryID,
            'FromPhoneNumber' => $this->FromPhoneNumber,
            'FromSenderID' => $this->FromSenderID,
            'Message' => $this->Message,
            'EffectiveDate' => $this->EffectiveDate,
            'IsDeleted' => $this->IsDeleted,
            'CreatedOn' => $this->CreatedOn,
            'CreatedBy' => $this->CreatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn,
            'LastUpdatedBy' => $this->LastUpdatedBy,
        ];
    }
}
