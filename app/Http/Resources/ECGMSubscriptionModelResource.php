<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGMSubscriptionModelResource extends JsonResource
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
            'subscription_id' => $this->SubscriptionID, // Adjust field names as per your database
            'user_id'         => $this->UserID,
            'plan_id'         => $this->PlanID,
            'start_date'      => $this->StartDate,
            'end_date'        => $this->EndDate,
            'status'          => $this->Status,
            'created_on'      => $this->CreatedOn,
            'created_by'      => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            // Add other fields as necessary
        ];
    }
}