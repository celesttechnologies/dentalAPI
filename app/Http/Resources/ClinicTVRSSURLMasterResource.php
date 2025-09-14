<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicTVRSSURLMasterResource extends JsonResource
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
            'id' => $this->NewsTickerRSSMasterID, // Primary key
            'rss_title' => $this->RSSTitle, // Title of the RSS feed
            'rss_description' => $this->RSSDescription, // Description of the RSS feed
            'rss_url' => $this->RSSURL, // URL of the RSS feed
            'rss_xml' => $this->RSSXML, // XML content of the RSS feed
            'is_user_configurable' => $this->IsUserConfigurable, // User configurable flag
            'is_online_feed' => $this->IsOnlineFeed, // Online feed flag
            'is_auto_sync' => $this->IsAutoSync, // Auto sync flag
            'sync_frequency' => $this->SyncFrequency, // Sync frequency
            'last_sync_time' => $this->LastSyncTime, // Last sync timestamp
            'is_deleted' => $this->IsDeleted, // Soft delete flag
            'last_updated_on' => $this->LastUpdatedOn, // Timestamp of last update
            'last_updated_by' => $this->LastUpdatedBy, // User who last updated the record
        ];
    }
}