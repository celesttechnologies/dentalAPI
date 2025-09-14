<?php

namespace App\Services;

use App\Models\PatientPersonalAttribute; // Assuming you have a PatientPersonalAttribute model
use App\Http\Resources\PatientPersonalAttributeResource; // Assuming you have a resource for Patient Personal Attribute
use App\Models\Patient;

class PatientPersonalAttributeService
{
    /**
     * Get a paginated list of Patient Personal Attributes.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientPersonalAttributes(Patient $patient, int $perPage): array
    {
        $data = PatientPersonalAttribute::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient personal attributes

        return [
            'patient_personal_attributes' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    public function createPersonalAttribute(array $data): PatientPersonalAttribute
    {
        return PatientPersonalAttribute::create($data);
    }

    public function updatePersonalAttribute(PatientPersonalAttribute $ppa, array $data): PatientPersonalAttribute
    {
        $ppa->update($data);
        $ppa->fresh();

        return $ppa;
    }


}