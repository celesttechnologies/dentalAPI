<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientReceiptsDetailResource extends JsonResource
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
            'receipt_detail_id' => $this->ReceiptDetailID,
            'receipt_id' => $this->ReceiptID,
            'invoice_id' => $this->InvoiceID,
            'patient_treatment_done_id' => $this->PatientTreatmentDoneID,
            'amount_paid' => $this->AmountPaid,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}