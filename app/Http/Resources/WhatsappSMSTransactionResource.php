<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WhatsappSMSTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'whatsapp_sms_transaction_id' => $this->WhatsappSMSTransactionID,
            'clinic_id' => $this->ClinicID,
            'patient_id' => $this->PatientID,
            'mobile_number' => $this->MobileNumber,
            'message_text' => $this->MessageText,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'sent_status' => $this->SentStatus,
            'sent_on' => $this->SentOn,
            'sent_status_message' => $this->SentStatusMessage,
            'sms_situation' => $this->SMSSituation,
        ];
    }
}
