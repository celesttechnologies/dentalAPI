<?php

namespace App\Services;

use App\Models\PatientMedicalAttribute; // Assuming you have a PatientMedicalAttribute model
use App\Http\Resources\PatientMedicalAttributeResource; // Assuming you have a resource for Patient Medical Attribute
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientMedicalAttributeService
{
    /**
     * Get a paginated list of Patient Medical Attributes.
     *
     * @param int $perPage
     * @return array
     */
    public function getMedicalAttributes(Patient $patient, int $perPage): array
    {
        $data = PatientMedicalAttribute::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated medical attributes

        return [
            'medical_attributes' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }
    public function createMedicalAttribute(array $data): PatientMedicalAttribute
    {
        return PatientMedicalAttribute::create($data);
    }
    public function updateMedicalAttribute(PatientMedicalAttribute $pma, array $data): PatientMedicalAttribute
    {
        $pma->update($data);
        $pma->fresh();

        return $pma;
    }
}