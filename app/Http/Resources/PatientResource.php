<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource{
    public function toArray($request){
    return [
        'id' => $this->PatientID,
        'title' => $this->Title,
        'first_name' => $this->FirstName,
        'last_name' => $this->LastName,
        'gender' => $this->Gender,
        'dob' => $this->DOB,
        'phone' => $this->PhoneNumber,
        'mobile' => $this->MobileNumber,
        'email' => $this->EmailAddress1,
        'email2' => $this->EmailAddress2,
        'occupation' => $this->Occupation,
        'case_id' => $this->CaseID,
        'patient_code' => $this->PatientCode,
        'age' => $this->Age,
        'registration_date' => $this->RegistrationDate,
        'referred_by' => $this->ReferredBy,
        'abha_id' => $this->AbhaID,
    ];
}
}