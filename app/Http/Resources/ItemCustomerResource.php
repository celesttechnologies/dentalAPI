<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemCustomerResource extends JsonResource
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
            'item_customer_id' => $this->ItemCustomerID,
            'clinic_id' => $this->ClinicID,
            'customer_name' => $this->CustomerName,
            'registration_no' => $this->RegistrationNo,
            'contact_person' => $this->ContactPerson,
            'notes' => $this->Notes,
            'street1' => $this->Street1,
            'street2' => $this->Street2,
            'city' => $this->City,
            'state' => $this->State,
            'country' => $this->Country,
            'postcode' => $this->Postcode,
            'isd' => $this->ISD,
            'std' => $this->STD,
            'phone' => $this->Phone,
            'permanent_address' => $this->PermanentAddress,
            'added_on' => $this->AddedOn,
            'added_by' => $this->AddedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'deleted_on' => $this->DeletedOn,
            'deleted_by' => $this->DeletedBy,
            'is_active' => $this->IsActive,
            'row_guid' => $this->rowguid,
        ];
    }
}