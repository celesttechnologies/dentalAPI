<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemSupplierResource extends JsonResource
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
            'item_supplier_id' => $this->ItemSupplierID, // Maps to 'ItemSupplierID'
            'clinic_id' => $this->ClinicID, // Maps to 'ClinicID'
            'supplier_name' => $this->SupplierName, // Maps to 'SupplierName'
            'registration_no' => $this->RegistrationNo, // Maps to 'RegistrationNo'
            'contact_person' => $this->ContactPerson, // Maps to 'ContactPerson'
            'notes' => $this->Notes, // Maps to 'Notes'
            'street1' => $this->Street1, // Maps to 'Street1'
            'street2' => $this->Street2, // Maps to 'Street2'
            'city' => $this->City, // Maps to 'City'
            'state' => $this->State, // Maps to 'State'
            'country' => $this->Country, // Maps to 'Country'
            'postcode' => $this->Postcode, // Maps to 'Postcode'
            'isd' => $this->ISD, // Maps to 'ISD'
            'std' => $this->STD, // Maps to 'STD'
            'phone' => $this->Phone, // Maps to 'Phone'
            'permanent_address' => $this->PermanentAddress, // Maps to 'PermanentAddress'
            'added_on' => $this->AddedOn, // Maps to 'AddedOn'
            'added_by' => $this->AddedBy, // Maps to 'AddedBy'
            'last_updated_on' => $this->LastUpdatedOn, // Maps to 'LastUpdatedOn'
            'last_updated_by' => $this->LastUpdatedBy, // Maps to 'LastUpdatedBy'
            'deleted_on' => $this->DeletedOn, // Maps to 'DeletedOn'
            'deleted_by' => $this->DeletedBy, // Maps to 'DeletedBy'
            'is_active' => $this->IsActive, // Maps to 'IsActive'
            'row_guid' => $this->rowguid, // Maps to 'rowguid'
        ];
    }
}