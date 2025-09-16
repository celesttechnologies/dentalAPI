<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'client_id' => $this->ClientID,
            'client_name' => $this->ClientName,
            'address1' => $this->Address1,
            'address2' => $this->Address2,
            'city' => $this->City,
            'state' => $this->State,
            'country_id' => $this->CountryID,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'description' => $this->Description,
            'email' => $this->Email,
            'fax' => $this->Fax,
            'final_description' => $this->FinalDescription,
            'is_deleted' => $this->IsDeleted,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'no_of_clinics' => $this->NoOfClinics,
            'phone' => $this->Phone,
            'revenue' => $this->Revenue,
            'rowguid' => $this->rowguid,
        ];
    }
}