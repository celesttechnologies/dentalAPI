<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->EmailTransactionID,
            'clinic_id' => $this->ClinicIID,
            'patient_id' => $this->PatientID,
            'email_type_id' => $this->EmailTypeID,
            'email_to' => $this->EmailTo,
            'email_from' => $this->EmailFrom,
            'email_cc' => $this->EmailCC,
            'email_bcc' => $this->EmailBcc,
            'subject' => $this->Subject,
            'message_text' => $this->MessageText,
            'email_attachments_id' => $this->EmailAttachmentsID,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'status' => $this->Status,
            'sent_on' => $this->SentOn,
            'is_deleted' => $this->IsDeleted,
            'email_from_name' => $this->EmailFromName,
            'email_to_name' => $this->EmailToName,
            'scheduled_on' => $this->ScheduledOn,
        ];
    }
}