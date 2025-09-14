<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankDepositResource extends JsonResource
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
            'bank_deposit_id' => $this->BankDepositID,
            'date' => $this->Date,
            'bank_account_id' => $this->BankAccountID,
            'amount' => $this->Amount,
            'comments' => $this->Comments,
            'transaction_id' => $this->TransactionID,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'is_deleted' => (bool) $this->IsDeleted, // Cast to boolean for clarity
            'row_guid' => $this->rowguid,
        ];
    }
}