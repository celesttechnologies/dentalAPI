<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AspnetPersonalizationPerUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           
                'Id' => $this->Id,
                'path_id' => $this->PathId,
                'user_id' => $this->UserId,
                'page_settings' => base64_encode($this->PageSettings), // Convert BLOB to a readable format
                'last_updated_date' => $this->LastUpdatedDate,
            ];
       
    }
}
