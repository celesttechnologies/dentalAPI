<?php

namespace App\Services;

use App\Models\PatientMedicalHistoryAttribute; // Assuming you have a PatientMedicalHistoryAttribute model
use App\Http\Resources\PatientMedicalHistoryAttributeResource; // Assuming you have a resource for Patient Medical History Attribute
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientMedicalHistoryAttributeService
{
    /**
     * Get a paginated list of Patient Medical History Attributes.
     *
     * @param int $perPage
     * @return array
     */
    public function getMedicalHistoryAttributes(Patient $patient, int $perPage): array
    {
        $data = PatientMedicalHistoryAttribute::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated medical history attributes

        return [
            'medical_history_attributes' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                
            ]
        ];
    }

    public function createMedicalHistoryAttribute(array $data): PatientMedicalHistoryAttribute
    {
        return PatientMedicalHistoryAttribute::create($data);
    }

    
    public function updateMedicalHistoryAttribute(PatientMedicalHistoryAttribute $pmha, array $data): PatientMedicalHistoryAttribute
    {
        $pmha->update($data);
        $pmha->fresh();

        return $pmha;
    }
}