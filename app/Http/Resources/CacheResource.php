<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CacheResource extends JsonResource
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
            'key' => $this->key,
            'value' => $this->value,
            'expiration' => $this->expiration,
        ];
    }
}