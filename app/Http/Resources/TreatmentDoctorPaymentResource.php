<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentDoctorPaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'treatment_payment_id' => $this->TreatmentPaymentId,
            'treatment_done_id' => $this->TreatmentDoneId,
            'provider_id' => $this->ProviderId,
            'amount' => $this->Amount,
            'rowguid' => $this->rowguid,
            'added_on' => $this->AddedOn,
            'added_by' => $this->AddedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}
