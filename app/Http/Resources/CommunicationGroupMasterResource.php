<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommunicationGroupMasterResource extends JsonResource
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
            'communication_group_guid' => $this->CommunicationGroupMasterGuid,
            'group_name' => $this->GroupName,
            'clinic_id' => $this->ClinicID,
            'group_type' => $this->GroupType,
            'group_description' => $this->GroupDescription,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'is_patient_group' => $this->IsPatientGroup,
            'is_other_group' => $this->IsOtherGroup,
        ];
    }
}