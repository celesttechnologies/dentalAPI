<?php

namespace App\Services;

use App\Models\PatientSetting; // Assuming you have a PatientSetting model
use App\Http\Resources\PatientSettingResource; // Assuming you have a resource for Patient Setting
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientSettingService
{
    /**
     * Get a paginated list of Patient Settings.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientSettings(Patient $patient, int $perPage): array
    {
        $data = PatientSetting::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient settings

        return [
            'patient_settings' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

    /**
     * Create a new patient setting record.
     *
     * @param array $data The validated data for creating the patient setting
     * @return PatientSetting The newly created patient setting model
     */
    public function createSetting(array $data): PatientSetting
    {
        return PatientSetting::create($data);
    }

    /**
     * Update an existing patient setting record.
     *
     * @param PatientSetting $patientSetting The patient setting model to update
     * @param array $data The validated data for updating the patient setting
     * @return PatientSetting The updated patient setting model
     */
    public function updateSetting(PatientSetting $patientSetting, array $data): PatientSetting
    {
        $patientSetting->update($data);
        return $patientSetting;
    }
}
