<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDentalHistoryAttributeResource extends JsonResource
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
            'ID' => $this->PatientDentalHistoryAttributeID,
            'Category' => $this->DentalHistoryAttributesCategory,
            'AttributeID' => $this->DentalHistoryAttributeID,
            'AttributeValue' => $this->DentalHistoryAttributeValue,
            'AttributeText' => $this->DentalHistoryAttributeText,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn,
        ];
    }
}