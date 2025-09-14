<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGClinicSubscriptionModelRedource extends JsonResource
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
            'clinic_subscription_detail_id' => $this->ClinicSubscriptionDetailID,
            'clinic_id'                     => $this->ClinicID,
            'subscription_package_id'        => $this->SubscriptionPackageID,
            'start_date'                    => $this->StartDate,
            'end_date'                      => $this->EndDate,
            'is_current_subscription'        => $this->IsCurrentSubscription,
            'created_on'                    => $this->CreatedOn,
            'created_by'                    => $this->CreatedBy,
            'last_updated_on'               => $this->LastUpdatedOn,
            'last_updated_by'               => $this->LastUpdatedBy,
        ];
    }
}