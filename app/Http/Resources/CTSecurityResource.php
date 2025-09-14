<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CTSecurityResource extends JsonResource
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
            'security_id'         => $this->SecurityID,
            'object_type'         => $this->ObjectType,
            'object_id'           => $this->ObjectID,
            'object_details'      => $this->ObjectDetails,
            'user_object_id'      => $this->UserObjectID,
            'user_object_type'     => $this->UserObjectType,
            'full_control'        => $this->FullControl,
            'write'               => $this->Write,
            'modify'              => $this->Modify,
            'read_execute'        => $this->ReadExecute,
            'list_content'        => $this->ListContent,
            'read_only'           => $this->ReadOnly,
            'special_permissions' => $this->SpecialPermissions,
            'created_by'          => $this->CreatedBy,
            'created_on'          => $this->CreatedOn,
            'last_updated_by'     => $this->LastUpdatedBy,
            'last_updated_on'     => $this->LastUpdatedOn,
        ];
    }
}