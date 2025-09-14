<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AspnetApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ApplicationName' => $this->WaitingAreaID,
            'LoweredApplicationName'=> $this->PatientID,
            'ApplicationId' => $this->StartDateTime,
            'Description' => $this->EndDateTime
        ];
    }
}
