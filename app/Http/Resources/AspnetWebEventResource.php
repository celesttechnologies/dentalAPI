<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetWebEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     
     */
    public function toArray($request)
    {
        return [
            'event_id' => $this->EventId,
            'event_time_utc' => $this->EventTimeUtc,
            'event_time' => $this->EventTime,
            'event_type' => $this->EventType,
            'event_sequence' => $this->EventSequence,
            'event_occurrence' => $this->EventOccurrence,
            'event_code' => $this->EventCode,
            'event_detail_code' => $this->EventDetailCode,
            'message' => $this->Message,
            'application_path' => $this->ApplicationPath,
            'application_virtual_path' => $this->ApplicationVirtualPath,
            'machine_name' => $this->MachineName,
            'request_url' => $this->RequestUrl,
            'exception_type' => $this->ExceptionType,
            'details' => $this->Details,
        ];
    }
}