<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicTVClinicRSSDatumResource extends JsonResource
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
            'id' => $this->ClinicRSSID, // Primary key
            'clinic_id' => $this->ClinicID, // Foreign key to Clinic
            'news_ticker_rss_master_id' => $this->NewsTickerRSSMasterID, // Foreign key to News Ticker RSS Master
            'rss_url' => $this->RSSURL, // URL of the RSS feed
            'rss_title' => $this->RSSTitle, // Title of the RSS feed
            'rss_description' => $this->RSSDescription, // Description of the RSS feed
            'rss_xml' => $this->RSSXML, // XML content of the RSS feed
            'rss_text' => $this->RSSText, // Text content of the RSS feed
            'is_user_configurable' => $this->IsUserConfigurable, // User configurable flag
            'is_deleted' => $this->IsDeleted, // Soft delete flag
            'created_on' => $this->CreatedOn, // Timestamp of creation
            'created_by' => $this->CreatedBy, // User who created the record
            'last_updated_on' => $this->LastUpdatedOn, // Timestamp of last update
            'last_updated_by' => $this->LastUpdatedBy, // User who last updated the record
        ];
    }
}