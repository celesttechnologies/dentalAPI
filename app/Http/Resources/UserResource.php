<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->UserID,
            'role_id' => $this->RoleID,
            'client_id' => $this->ClientID,
            'user_name' => $this->UserName,
            'email' => $this->Email,
            'name' => $this->Name,
            'is_deleted' => $this->IsDeleted,
            'mobile' => $this->Mobile,
        ];
    }
}
