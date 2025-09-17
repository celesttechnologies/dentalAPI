<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientWithAppointmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'status' => true,
            'message' => 'Patient retrieved successfully',
            'data' => [
                'PatientID' => $this->PatientID,
                'ClinicID' => $this->ClinicID,
                'ProviderID' => $this->ProviderID,
                'FullName' => "{$this->Title} {$this->FirstName} {$this->LastName}",
                'title' => $this->Title,
                'FirstName' => $this->FirstName,
                'LastName' => $this->LastName,
                'Gender' => $this->Gender,
                'DOB' => $this->DOB ? $this->DOB->format('Y-m-d') : null,
                'Age' => $this->Age,
                'CaseID' => $this->CaseID,
                'RegistrationDate' => $this->RegistrationDate ? $this->RegistrationDate->format('Y-m-d') : null,
                'ReferredBy' => $this->ReferredBy,
                'Occupation' => $this->Occupation,
                'FamilyID' => $this->FamilyID,
                'PatientRefNo' => $this->PatientRefNo,
                'Contact' => [
                    'Address' => [
                        'Line1' => $this->AddressLine1,
                        'Line2' => $this->AddressLine2,
                        'Street' => $this->Street,
                        'Area' => $this->Area,
                        'City' => $this->City,
                        'State' => $this->State,
                        'Country' => $this->Country,
                        'ZipCode' => $this->ZipCode,
                    ],
                    'PhoneNumber' => $this->PhoneNumber,
                    'MobileNumber' => $this->MobileNumber,
                    'Email' => $this->EmailAddress1,
                    'SecondaryEmail' => $this->EmailAddress2,
                ],
                'PatientCode' => $this->PatientCode,
                'Nationality' => $this->Nationality,
                'BloodGroup' => $this->BloodGroup,
                'Notes' => $this->PatientNotes,
                'IsDeceased' => $this->IsDead,
                'MedicalHistory' => PatientMedicalAttributeResource::collection($this->patient_medical_attributes),
                'DentalHistory' => PatientDentalHistoryAttributeResource::collection($this->patient_dental_history_attributes),
                'Allergy' => PatientAllergyAttributeResource::collection($this->patient_allergy_attributes),
                'Investigations' => PatientInvestigationResource::collection($this->patient_investigations),
                'Consent' => new PatientConsentDetailResource($this->consents),
              //  'PatientNotes' => new PatientNoteResource($this->patient_notes),
                // 'appointments' => AppointmentResource::collection($this->appointments),
            ]
        ];
    }
}
