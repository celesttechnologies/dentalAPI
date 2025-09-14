<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailTemplateResource extends JsonResource
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
            'id' => $this->id, // Assuming there's an 'id' field in the EmailTemplate model
            'template_name' => $this->template_name, // Assuming there's a 'template_name' field
            'subject' => $this->subject, // Assuming there's a 'subject' field
            'body' => $this->body, // Assuming there's a 'body' field
            // Add other fields as necessary
        ];
    }
}