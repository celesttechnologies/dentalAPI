<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientReceiptResource extends JsonResource
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
            'receipt_id' => $this->ReceiptID,
            'clinic_id' => $this->ClinicID,
            'receipt_no' => $this->ReceiptNo,
            'receipt_number' => $this->ReceiptNumber,
            'manual_receipt_no' => $this->ManualReceiptNo,
            'receipt_code_prefix' => $this->ReceiptCodePrefix,
            'invoice_id' => $this->InvoiceID,
            'receipt_date' => $this->ReceiptDate,
            'patient_id' => $this->PatientID,
            'patient_name' => trim($this->patient->Title) . ' ' . trim($this->patient->FirstName) . ' ' . trim($this->patient->LastName),
            'patient_treatment_done_id' => $this->PatientTreatmentDoneId,
            'treatment_payment' => $this->TreatmentPayment,
            'invoiced_amount' => $this->InvoicedAmount,
            'balance_amount' => $this->BalanceAmount,
            'mode_of_payment' => $this->ModeofPayment,
            'cheque_no' => $this->ChequeNo,
            'cheque_date' => $this->ChequeDate,
            'bank_name' => $this->BankName,
            'credit_card_bank_id' => $this->CreditCardBankID,
            'credit_card_digit' => $this->CreditCardDigit,
            'credit_card_owner' => $this->CreditCardOwner,
            'credit_card_valid_from' => $this->CreditCardValidFrom,
            'credit_card_valid_to' => $this->CreditCardValidTo,
            'payment_notes' => $this->PaymentNotes,
            'is_cancelled' => $this->IsCancelled,
            'cancellation_notes' => $this->CancellationNotes,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
            'waiting_area_id' => $this->WaitingAreaID,
            'insurance_name' => $this->InsuranceName,
            'policy_number' => $this->PolicyNumber,
            'policy_notes' => $this->PolicyNotes,
            'receipt_notes' => $this->ReceiptNotes,
            // Add related receipt details (one-to-many)
            'receipt_details' => PatientReceiptsDetailResource::collection($this->receiptDetails),
        ];
    }
}