<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
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
            'id' => $this->FamilyID, // Assuming there's a 'FamilyID' field
            'name' => $this->Name, // Assuming there's a 'Name' field
            'address' => $this->Address, // Assuming there's an 'Address' field
            'phone' => $this->Phone, // Assuming there's a 'Phone' field
            // Add other fields as necessary
        ];
    }
}