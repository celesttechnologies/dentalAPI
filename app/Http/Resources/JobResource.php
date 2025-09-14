<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'id' => $this->id, // Maps to 'id'
            'queue' => $this->queue, // Maps to 'queue'
            'payload' => $this->payload, // Maps to 'payload'
            'attempts' => $this->attempts, // Maps to 'attempts'
            'reserved_at' => $this->reserved_at, // Maps to 'reserved_at'
            'available_at' => $this->available_at, // Maps to 'available_at'
            'created_at' => $this->created_at, // Maps to 'created_at'
        ];
    }
}