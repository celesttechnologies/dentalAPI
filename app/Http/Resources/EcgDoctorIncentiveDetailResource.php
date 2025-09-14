<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcgDoctorIncentiveDetailResource extends JsonResource
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
            'incentive_detail_id'       => $this->IncetiveDetailId,
            'incentive_id'              => $this->IncetiveId,
            'patient_treatment_done_id' => $this->PatientTreatmentDoneID,
            'treatment_total_cost'      => $this->TreatmentTotalCost,
            'incentive_amount'          => $this->IncentiveAmount,
            'incentive_type'            => $this->IncentiveType,
            'incentive_value'           => $this->IncentiveValue,
            'is_deleted'                => $this->IsDeleted,
            'added_by'                  => $this->AddedBy,
            'added_on'                  => $this->AddedOn,
            'last_updated_by'           => $this->LastUpdatedBy,
            'last_updated_on'           => $this->LastUpdatedOn,
        ];
    }
}