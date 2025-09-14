<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWSConfigServiceResource extends JsonResource
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
            'service_id'          => $this->ServiceID,
            'clinic_website_id'   => $this->ClinicWebSiteID,
            'service_name'        => $this->ServiceName,
            'service_description' => $this->ServiceDescription,
            'is_deleted'          => $this->IsDeleted,
            'created_on'          => $this->CreatedOn,
            'created_by'          => $this->CreatedBy,
            'last_updated_on'     => $this->LastUpdatedOn,
            'last_updated_by'     => $this->LastUpdatedBy,
        ];
    }
}