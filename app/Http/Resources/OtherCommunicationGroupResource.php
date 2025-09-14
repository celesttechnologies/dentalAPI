<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OtherCommunicationGroupResource extends JsonResource
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
            'other_communication_group' => $this->OtherCommunicationGroup, // Maps to 'OtherCommunicationGroup'
            'communication_group_master_id' => $this->CommunicationGroupMasterID, // Maps to 'CommunicationGroupMasterID'
            'first_name' => $this->FirstName, // Maps to 'FirstName'
            'last_name' => $this->LastName, // Maps to 'LastName'
            'mobile_number' => $this->MobileNumber, // Maps to 'MobileNumber'
            'email_id' => $this->EmailID, // Maps to 'EmailID'
            'group_type' => $this->GroupType, // Maps to 'GroupType'
            'is_deleted' => $this->IsDeleted, // Maps to 'IsDeleted'
            'created_by' => $this->CreatedBy, // Maps to 'CreatedBy'
            'created_on' => $this->CreatedOn, // Maps to 'CreatedOn'
            'last_updated_by' => $this->LastUpdatedBy, // Maps to 'LastUpdatedBy'
            'last_updated_on' => $this->LastUpdatedOn, // Maps to 'LastUpdatedOn'
            'group_source' => $this->GroupSource, // Maps to 'GroupSource'
            'group_source_desc' => $this->GroupSourceDesc, // Maps to 'GroupSourceDesc'
            'country_dial_code' => $this->CountryDialCode, // Maps to 'CountryDialCode'
        ];
    }
}