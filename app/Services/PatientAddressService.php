<?php

namespace App\Services;

use App\Http\Resources\PatientAddressResource;
use App\Models\Patient;
use App\Models\PatientAddress;

class PatientAddressService
{
    public function getPatients(Patient $patient, int $perPage): array
    {
        // Fetch the attributes from the database with pagination
        $data = PatientAddress::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'patients' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createAddress(array $data): PatientAddress
    {
        return PatientAddress::create($data);
    }

    public function updateAddress(PatientAddress $patientAddress, array $data): PatientAddress
    {
        $patientAddress->update($data);
        $patientAddress->fresh();

        return $patientAddress;
    }
}
