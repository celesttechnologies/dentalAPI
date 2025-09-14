<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcgActivityEventResource extends JsonResource
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
            'event_activity_id'    => $this->EventActivityID,
            'clinic_id'            => $this->ClinicID,
            'patient_id'           => $this->PatientID,
            'event_type_id'        => $this->EventTypeID,
            'event_related_id'     => $this->EventRelatedID,
            'event_type_name'      => $this->EventTypeName,
            'event_details'        => $this->EventDetails,
            'device_type_id'       => $this->DeviceTypeID,
            'ip_address'           => $this->IpAddress,
            'is_deleted'           => $this->Isdeleted,
            'created_on'           => $this->CreatedOn,
            'created_by'           => $this->CreatedBy,
            'last_updated_on'      => $this->LastUpdatedOn,
            'last_updated_by'      => $this->LastUpdatedBy,
            'event_related_file_id' => $this->EventRelatedFileId,
        ];
    }
}