<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWSConfigClinicTimingResource extends JsonResource
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
            'clinic_timing_id'  => $this->ClinicTimingID,
            'clinic_website_id' => $this->ClinicWebSiteID,
            'day_id'            => $this->DayID,
            'day_of_week'       => $this->DayofWeek,
            'timings_text'      => $this->TimingsText,
            'is_deleted'        => $this->IsDeleted,
            'created_on'        => $this->CreatedOn,
            'created_by'        => $this->CreatedBy,
            'last_updated_on'   => $this->LastUpdatedOn,
            'last_updated_by'   => $this->LastUpdatedBy,
        ];
    }
}