<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ECGWebMessageResource extends JsonResource
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
            'message_id'     => $this->MessageID,
            'request_int_id' => $this->RequestIntID,
            'request_type_id'=> $this->RequestTypeID,
            'first_name'     => $this->FirstName,
            'last_name'      => $this->LastName,
            'email'          => $this->Email,
            'contact_number' => $this->ContactNumber,
            'clinic_name'    => $this->ClinicName,
            'clinic_address' => $this->ClinicAddress,
            'other_details'  => $this->OtherDetails,
            'message'        => $this->Message,
            'status'         => $this->status,
            'created_on'     => $this->CreatedOn,
            'created_by'     => $this->CreatedBy,
            'last_updated_on'=> $this->LastUpdatedOn,
            'last_updated_by'=> $this->LastUpdatedBy,
        ];
    }
}