<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AspnetProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->UserId,
            'property_names' => $this->PropertyNames,
            'property_values_string' => $this->PropertyValuesString,
            'property_values_binary' => base64_encode($this->PropertyValuesBinary), // Convert binary data
            'last_updated_date' => $this->LastUpdatedDate->format('Y-m-d H:i:s'),
        ];
    }
}