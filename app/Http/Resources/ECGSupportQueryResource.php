<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGSupportQueryResource extends JsonResource
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
            'query_id'    => $this->QueryID,
            'name'        => $this->Name,
            'email'       => $this->EmailId,
            'contact_no'  => $this->ContactNo,
            'query'       => $this->Query,
            'clinic_id'   => $this->ClinicID,
            'query_date'  => $this->QueryDate,
            'city'        => $this->City,
            'ip_address'  => $this->IPAddress,
        ];
    }
}