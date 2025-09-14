<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->StateID,
            'country_id' => $this->CountryID,
            'state_code' => $this->StateCode,
            'state_desc' => $this->StateDesc
        ];
    }
}
