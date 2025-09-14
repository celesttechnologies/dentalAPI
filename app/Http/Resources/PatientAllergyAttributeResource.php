<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientAllergyAttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->PatientAllergyDetailID,
            'Category' => $this->AllergyAttributesCategory,
            'AttributesID' => $this->AllergyAttributesID,
            'AttributeValue' => $this->AllergyAttributeValue,
            'AttributeText' => $this->AllergyAttributeText,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'LastUpdatedBy' => $this->LastUpdatedBy,
        ];
    }
}
