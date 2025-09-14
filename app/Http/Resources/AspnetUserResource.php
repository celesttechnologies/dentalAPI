<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetUserResource extends JsonResource
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
            'user_id' => $this->UserId,
            'username' => $this->UserName,
            'lowered_username' => $this->LoweredUserName,
            'mobile_alias' => $this->MobileAlias,
            'is_anonymous' => (bool) $this->IsAnonymous, // Cast to boolean for clarity
            'last_activity_date' => $this->LastActivityDate,
            'clinic_id' => $this->ClinicID,
            'client_id' => $this->ClientID,
        ];
    }
}
