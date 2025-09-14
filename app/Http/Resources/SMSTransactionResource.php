<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SMSTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'SMSTransactionID' => $this->SMSTransactionID,
            'ClinicID' => $this->ClinicID,
            'ReferenceCode' => $this->ReferenceCode,
            'PatientID' => $this->PatientID,
            'SMSTypeID' => $this->SMSTypeID,
            'MobileNumber' => $this->MobileNumber,
            'MessageText' => $this->MessageText,
            'ScheduledOn' => $this->ScheduledOn,
            'CreatedOn' => $this->CreatedOn,
            'CreatedBy' => $this->CreatedBy,
            'SentStatus' => $this->SentStatus,
            'SentOn' => $this->SentOn,
            'SentStatusMessage' => $this->SentStatusMessage,
            'IsPromotional' => $this->IsPromotional,
        ];
    }
}
