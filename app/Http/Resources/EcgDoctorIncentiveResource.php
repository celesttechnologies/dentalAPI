<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcgDoctorIncentiveResource extends JsonResource
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
            'incentive_id'          => $this->IncetiveId,
            'clinic_id'             => $this->ClinicId,
            'provider_id'           => $this->ProviderId,
            'month'                 => $this->Month,
            'year'                  => $this->Year,
            'total_incentive_amount' => $this->TotalIncentiveAmount,
            'is_deleted'            => $this->IsDeleted,
            'created_on'            => $this->CreatedOn,
            'created_by'            => $this->CreatedBy,
            'last_updated_on'       => $this->LastUpdatedOn,
            'last_updated_by'       => $this->LastUpdatedBy,
        ];
    }
}