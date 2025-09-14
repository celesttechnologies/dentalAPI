<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientTreatmentByIdResource extends JsonResource{
    public function toArray($request){
        return [
            'PatientTreatmentID' => $this->PatientTreatmentID,
            'PatientID' => $this->PatientID,
            'ProviderID' => $this->ProviderID,
            'TreatmentTypeID' => $this->TreatmentTypeID,
            'TeethTreatment' => $this->TeethTreatment,
            'TreatmentDetails' => $this->TreatmentDetails,
            'TreatmentCost' => $this->TreamentCost,
            'TreatmentPayment' => $this->TreatmentPayment,
            'TreatmentBalance' => $this->TreatmentBalance,
            'TreatmentDate' => $this->TreatmentDate,
            'ProviderInchargeID' => $this->ProviderInchargeID,
            'IsDeleted' => (bool) $this->IsDeleted,
            'AddedBy' => $this->AddedBy,
            'AddedOn' => $this->AddedOn,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn,
            'rowguid' => $this->rowguid,
    ];
}
}