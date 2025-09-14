<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource{
    public function toArray($request){
    return [
        'id' => $this->CountryID,
        'country_code' => $this->CountryCode,
        'country_name' => $this->CountryName
    ];
}
}