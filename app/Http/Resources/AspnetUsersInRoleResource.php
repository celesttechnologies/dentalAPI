<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetUsersInRoleResource extends JsonResource
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
            'user_id' => $this->UserId, // Assuming you have a 'User Id' field
            'role_id' => $this->RoleId, // Assuming you have a 'RoleId' field
            // Add other fields as necessary
        ];
    }
}