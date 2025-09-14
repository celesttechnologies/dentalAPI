<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientInvestigationResource extends JsonResource
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
            'ID' => $this->PatientInvestigationID,
            'Date' => $this->DateOfInvestigation,
            'Weight' => $this->Weight,
            'BloodPressure' => $this->BloodPressure,
            'FBS' => $this->FBS,
            'PLBS' => $this->PLBS,
            'HbAC' => $this->HbAC,
            'LDL' => $this->LDL,
            'ACR' => $this->ACR,
            'Retina' => $this->Retina,
            'Urine' => $this->Urine,
            'Others' => $this->Others,
            'CustomFields' => [
                'Custom1' => $this->Custom1,
                'Custom2' => $this->Custom2,
                'Custom3' => $this->Custom3,
                'Custom4' => $this->Custom4,
                'Custom5' => $this->Custom5,
                'Custom6' => $this->Custom6,
                'Custom7' => $this->Custom7,
                'Custom8' => $this->Custom8,
            ],
            'IsDeleted' => $this->IsDeleted,
            'CreatedBy' => $this->CreatedBy,
            'CreatedOn' => $this->CreatedOn,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn
        ];
    }
}