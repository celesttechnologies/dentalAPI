<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicTVNewsTickerResource extends JsonResource
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
            'id' => $this->NewsTickerID, // Primary key
            'clinic_id' => $this->ClinicID, // Foreign key to Clinic
            'title' => $this->Title, // Title of the news ticker
            'news_ticker_text' => $this->NewsTickerText, // Text of the news ticker
            'published_from' => $this->PublishedFrom, // Start date of publication
            'published_to' => $this->PublishedTo, // End date of publication
            'is_deleted' => $this->IsDeleted, // Soft delete flag
            'created_on' => $this->CreatedOn, // Timestamp of creation
            'created_by' => $this->CreatedBy, // User who created the record
            'last_updated_on' => $this->LastUpdatedOn, // Timestamp of last update
            'last_updated_by' => $this->LastUpdatedBy, // User who last updated the record
        ];
    }
}