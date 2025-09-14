<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGConfigChannelInformationResource extends JsonResource
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
            'channel_information_id' => $this->ChannelInformationID,
            'ecg_channel_id'         => $this->ECGChannelID,
            'information_title'      => $this->InformationTitle,
            'title_link'             => $this->TitleLink,
            'title_link_tag'         => $this->TitleLinkTag,
            'description'            => $this->Description,
            'other_link'             => $this->OtherLink,
            'other_link_tag'         => $this->OtherLinkTag,
            'publish_till'           => $this->PublishTill,
            'is_active'              => $this->IsActive,
            'created_on'             => $this->CreatedOn,
            'created_by'             => $this->CreatedBy,
            'last_updated_on'        => $this->LastUpdatedOn,
            'last_updated_by'        => $this->LastUpdatedBy,
        ];
    }
}