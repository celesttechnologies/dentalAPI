<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGConfigChannelResource extends JsonResource
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
            'ecg_channel_id'       => $this->ECGChannelID,
            'clinic_id_csv'        => $this->ClinicIDCSV,
            'channel_name'         => $this->ChannelName,
            'channel_description'  => $this->ChannelDescription,
            'channel_type_id'      => $this->ChannelTypeID,
            'publish_from'         => $this->PublishFrom,
            'publish_to'           => $this->PublishTo,
            'is_active'            => $this->IsActive,
            'created_on'           => $this->CreatedOn,
            'created_by'           => $this->CreatedBy,
            'last_updated_on'      => $this->LastUpdatedOn,
            'last_updated_by'      => $this->LastUpdatedBy,
        ];
    }
}