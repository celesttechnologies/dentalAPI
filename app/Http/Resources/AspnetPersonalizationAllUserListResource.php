<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetPersonalizationAllUserListResource extends JsonResource
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
            'path_id'          => $this->PathId,
            'page_settings'    => base64_encode($this->PageSettings),
            'last_updated_date'=> $this->LastUpdatedDate,
        ];
    }
}