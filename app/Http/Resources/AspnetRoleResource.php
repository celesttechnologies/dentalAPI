<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetRoleResource extends JsonResource
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
            'application_id' => $this->ApplicationId,
            'role_id' => $this->RoleId,
            'role_name' => $this->RoleName,
            'lowered_role_name' => $this->LoweredRoleName,
            'description' => $this->Description,
        ];
    }
}
