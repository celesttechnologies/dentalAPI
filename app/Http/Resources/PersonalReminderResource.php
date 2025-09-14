<?php

namespace App\Http\Resources;

use App\Models\PersonalReminder;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalReminderResource extends JsonResource
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
            'reminder_id' => $this->ReminderId,
            'clinic_id' => $this->ClinicID,
            'patient_name' => $this->patient->fullName ?? null,
            'user_id' => $this->UserID,
            'provider_name' => $this->doctor->ProviderName ?? null,
            'reminder_type_id' => $this->ReminderTypeID,
            'reminder_date' => $this->ReminderDate,
            'reminder_subject' => $this->ReminderSubject,
            'reminder_description' => $this->ReminderDescription,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'status_id' => $this->StatusId,
            'notes' => PersonalReminderNoteResource::collection($this->notes),
        ];
    }
}