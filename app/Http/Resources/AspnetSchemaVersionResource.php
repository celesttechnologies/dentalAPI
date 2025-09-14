<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetSchemaVersionResource extends JsonResource
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
            'feature' => $this->Feature,
            'compatible_schema_version' => $this->CompatibleSchemaVersion,
            'is_current_version' => (bool) $this->IsCurrentVersion, // Cast to boolean for clarity
        ];
    }
}