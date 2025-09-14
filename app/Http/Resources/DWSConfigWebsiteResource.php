<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWSConfigWebsiteResource extends JsonResource
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
            'clinic_website_id'     => $this->ClinicWebSiteID,
            'clinic_id'             => $this->ClinicID,
            'clinic_url'            => $this->ClinicURL,
            'clinic_name'           => $this->ClinicName,
            'clinic_description'    => $this->ClinicDescription,
            'clinic_address'        => $this->ClinicAddress,
            'city'                  => $this->City,
            'state'                 => $this->State,
            'zip_code'              => $this->ZipCode,
            'phone_number'          => $this->PhoneNumber,
            'clinic_map_path'       => $this->ClinicMapPath,
            'about_head_doctor'     => $this->AboutHeadDoctor,
            'default_theme_id'      => $this->DefaultThemeID,
            'default_language_id'   => $this->DefaultLanguageID,
            'facebook_url'          => $this->FacebookURL,
            'linkedin_url'          => $this->LinkedInURL,
            'twitter_url'           => $this->TwitterURL,
            'is_deleted'            => $this->IsDeleted,
            'created_on'            => $this->CreatedOn,
            'created_by'            => $this->CreatedBy,
            'last_updated_on'       => $this->LastUpdatedOn,
            'last_updated_by'       => $this->LastUpdatedBy,
            'clinic_logo'           => $this->ClinicLogo,
            'contact_email'         => $this->ContactEmail,
            'sub_domain'            => $this->SubDomain,
        ];
    }
}