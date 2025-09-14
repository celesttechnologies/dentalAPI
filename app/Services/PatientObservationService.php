<?php

namespace App\Services;

use App\Models\PatientObservation; // Assuming you have a PatientObservation model
use App\Http\Resources\PatientObservationResource; // Assuming you have a resource for Patient Observation
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientObservationService
{
    /**
     * Get a paginated list of Patient Observations.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientObservations(Patient $patient, int $perPage): array
    {
        $data = PatientObservation::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient observations

        return [
            'patient_observations' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                
            ]
        ];
    }

    
    public function createObservation(array $data): PatientObservation
    {
        return PatientObservation::create($data);
    }

    
    public function updateObservation(PatientObservation $patientObservation, array $data): PatientObservation
    {
        $patientObservation->update($data);
        $patientObservation->fresh();
        return $patientObservation;
    }

    
}