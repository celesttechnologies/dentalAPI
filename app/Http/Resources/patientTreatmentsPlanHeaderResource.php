<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientTreatmentsPlanHeaderResource extends JsonResource
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
            'ID' => $this->id,
            'PatientID' => $this->PatientID,
            'ProviderID' => $this->ProviderID,
            'TreatmentPlanName' => $this->TreatmentPlanName,
            'TreatmentCost' => $this->TreatmentCost,
            'TreatmentDiscount' => $this->TreatmentDiscount,
            'TreatmentTax' => $this->TreatmentTax,
            'TreatmentTotalCost' => $this->TreatmentTotalCost,
            'TreatmentDate' => $this->TreatmentDate,
            'ProviderInchargeID' => $this->ProviderInchargeID,
            'IsDeleted' => $this->IsDeleted,
            'AddedBy' => $this->AddedBy,
            'AddedOn' => $this->AddedOn,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn,
            'IsArchived' => $this->IsArchived,
            'ParentPatientTreatmentDoneID' => $this->ParentPatientTreatmentDoneID,
            'TreatmentAddition' => $this->TreatmentAddition,
            'TreatmentPlanStatusID' => $this->TreatmentPlanStatusID,
            'TreatmentDetails' => PatientTreatmentsPlanDetailResource::collection(
                $this->whenLoaded('patient_treatments_plan_details')
            ),
        ];
    }
}