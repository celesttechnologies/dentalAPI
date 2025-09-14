<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientInvoicesRBResource extends JsonResource
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
            'invoice_detail_id' => $this->InvoiceDetailID,
            'invoice_id' => $this->InvoiceID,
            'patient_treatment_done_id' => $this->PatientTreatmentDoneID,
            'treatment_date' => $this->TreatmentDate,
            'treatment_summary' => $this->TreatmentSummary,
            'treatment_cost' => $this->TreatmentCost,
            'treatment_addition' => $this->TreatmentAddition,
            'treatment_discount' => $this->TreatmentDiscount,
            'treatment_tax' => $this->TreatmentTax,
            'treatment_total_cost' => $this->TreatmentTotalCost,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}