<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWSConfigProviderResource extends JsonResource
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
            'provider_website_id'     => $this->ProviderWebsiteID,
            'clinic_website_id'       => $this->ClinicWebSiteID,
            'provider_id'             => $this->ProviderID,
            'provider_name'           => $this->ProviderName,
            'provider_description'    => $this->ProviderDescription,
            'provider_contact_number'  => $this->ProviderContactNumber,
            'is_deleted'              => $this->IsDeleted,
            'created_on'              => $this->CreatedOn,
            'created_by'              => $this->CreatedBy,
            'last_updated_on'         => $this->LastUpdatedOn,
            'last_updated_by'         => $this->LastUpdatedBy,
        ];
    }
}