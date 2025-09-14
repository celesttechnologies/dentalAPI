<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SMSTemplateTagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'SMSTemplatesTagID' => $this->SMSTemplatesTagID,
            'SMSTagCode' => $this->SMSTagCode,
            'SMSTagDescription' => $this->SMSTagDescription,
            'DefaultValue' => $this->DefaultValue,
            'SMSTagQuery' => $this->SMSTagQuery,
            'IsDeleted' => $this->IsDeleted,
        ];
    }
}
