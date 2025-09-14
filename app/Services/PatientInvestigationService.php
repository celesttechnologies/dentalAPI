<?php

namespace App\Services;

use App\Models\PatientInvestigation; // Assuming you have a PatientInvestigation model
use App\Http\Resources\PatientInvestigationResource; // Assuming you have a resource for Patient Investigation
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientInvestigationService
{
    /**
     * Get a paginated list of Patient Investigations.
     *
     * @param int $perPage
     * @return array
     */
    public function getInvestigations(Patient $patient, int $perPage): array
    {
        $data = PatientInvestigation::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated investigations

        return [
            'investigations' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
    public function createInvestigation(array $data): PatientInvestigation
    {
        return PatientInvestigation::create($data);
    }
    public function updateInvestigation(PatientInvestigation $patientInvestigation, array $data): PatientInvestigation
    {
        $patientInvestigation->update($data);
        $patientInvestigation->fresh();
        
        return $patientInvestigation;
    }
}