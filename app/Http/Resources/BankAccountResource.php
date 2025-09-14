<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
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
            'bank_account_id' => $this->BankAccountID,
            'clinic_id' => $this->ClinicID,
            'bank_account_name' => $this->BankAccountName,
            'account_number' => $this->AccountNumber,
            'branch' => $this->Branch,
            'city' => $this->City,
            'is_deleted' => (bool) $this->IsDeleted, // Cast to boolean for clarity
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'row_guid' => $this->rowguid,
        ];
    }
}