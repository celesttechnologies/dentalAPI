<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientSettingResource extends JsonResource
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
            'patient_setting_id' => $this->PatientSettingID,
            'patient_treatment_id' => $this->PatientTreatmentID,
            'setting' => $this->Setting,
            'setting_date' => $this->SettingDate,
            'provider_id' => $this->ProviderID,
            'provider_incharge_id' => $this->ProviderInchargeID,
            'work_done' => $this->WorkDone,
            'req_lab_work' => $this->ReqLabWork,
            'setting_note' => $this->SettingNote,
            'estimated_cost' => $this->EstimatedCost,
            'mode_of_payment' => $this->ModeOfPayment,
            'amount_paid' => $this->AmountPaid,
            'balance_amount' => $this->BalanceAmount,
            'available_balance' => $this->AvailableBalance,
            'cheque_no' => $this->ChequeNo,
            'cheque_date' => $this->ChequeDate,
            'bank_name' => $this->BankName,
            'credit_card_bank_id' => $this->CreditCardBankID,
            'credit_card_digit' => $this->CreditCardDigit,
            'credit_card_owner' => $this->CreditCardOwner,
            'credit_card_valid_from' => $this->CreditCardValidFrom,
            'credit_card_valid_to' => $this->CreditCardValidTo,
            'is_deleted' => $this->IsDeleted,
            'added_on' => $this->AddedOn,
            'added_by' => $this->AddedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'setting_id' => $this->SettingID,
            'id' => $this->ID,
            'rowguid' => $this->rowguid,
        ];
    }
}