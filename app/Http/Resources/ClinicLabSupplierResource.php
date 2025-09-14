<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicLabSupplierResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'lab_supplier_id' => $this->LabSupplierID,
            'supplier_name' => $this->SupplierName,
            'registration_no' => $this->RegistrationNo,
            'contact_person' => $this->ContactPerson,
            'email_address1' => $this->EmailAddress1,
            'email_address2' => $this->EmailAddress2,
            'notes' => $this->Notes,
            'address1' => $this->Address1,
            'address2' => $this->Address2,
            'is_email_lab_order_active' => $this->IsEmailLabOrderActive,
            'is_active' => $this->IsActive,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
        ];
    }
}
