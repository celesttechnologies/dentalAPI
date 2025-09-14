<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicSearchAgentResource extends JsonResource
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
            'id' => $this->SearchAgentID, // Primary key
            'clinic_id' => $this->ClinicID, // Foreign key to Clinic
            'agent_name' => $this->AgentName, // Name of the agent
            'agent_purpose_id' => $this->AgentPurposeID, // Purpose ID of the agent
            'agent_details' => $this->AgentDetails, // Additional details about the agent
            'is_deleted' => $this->IsDeleted, // Soft delete flag
            'created_on' => $this->CreatedOn, // Timestamp of creation
            'created_by' => $this->CreatedBy, // User who created the record
        ];
    }
}