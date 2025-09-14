<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientInvoiceResource extends JsonResource
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
            'id' => $this->InvoiceID,
            'clinic_id' => $this->ClinicID,
            'invoice_no' => $this->InvoiceNo,
            'invoice_number' => $this->InvoiceNumber,
            'manual_invoice_no' => $this->ManualInvoiceNo,
            'invoice_code_prefix' => $this->InvoiceCodePrefix,
            'invoice_date' => $this->InvoiceDate,
            'patient_id' => $this->PatientID,
            'patient_treatment_done_id' => $this->PatientTreatmentDoneID,
            'treatment_cost' => $this->TreatmentCost,
            'treatment_addition' => $this->TreatmentAddition,
            'treatment_discount' => $this->TreatmentDiscount,
            'treatment_tax' => $this->TreatmentTax,
            'treatment_total_cost' => $this->TreatmentTotalCost,
            'treatment_total_payment' => $this->TreatmentTotalPayment,
            'treatment_balance' => $this->TreatmentBalance,
            'is_deleted' => $this->IsDeleted,
            'is_cancelled' => $this->IsCancelled,
            'cancellation_notes' => $this->CancellationNotes,
            'status' => $this->Status,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'notes' => $this->Notes,
            'rowguid' => $this->rowguid,
            // Add related invoice details (one-to-many)
            'invoice_details' => PatientInvoicesDetailResource::collection($this->invoiceDetails),
            // Add related invoice RB (one-to-many)
            'invoice_rb' => PatientInvoicesRBResource::collection($this->invoiceRB),
        ];
    }
}