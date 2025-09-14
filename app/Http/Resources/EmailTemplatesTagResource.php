<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailTemplatesTagResource extends JsonResource
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
            'id' => $this->EmailTemplatesTagID,
            'email_tag_code' => $this->EmailTagCode,
            'email_tag_description' => $this->EmailTagDescription,
            'email_tag_query' => $this->EmailTagQuery,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}