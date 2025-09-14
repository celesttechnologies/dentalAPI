<?php

namespace App\Services;

use App\Models\PatientLab; // Assuming you have a PatientLab model
use App\Http\Resources\PatientLabResource; // Assuming you have a resource for Patient Lab
use App\Models\Patient;

class PatientLabService
{
    /**
     * Get a paginated list of Patient Labs.
     *
     * @param int $perPage
     * @return array
     */
    public function getLabs(Patient $patient, int $perPage): array
    {
        $data = PatientLab::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated labs

        return [
            'labs' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }
    public function createLab(array $data): PatientLab
    {
        return PatientLab::create($data);
    }
    public function updateLab(PatientLab $patientLab, array $data): PatientLab
    {
        $patientLab->update($data);
        $patientLab->fresh();

        return $patientLab;
    }
}