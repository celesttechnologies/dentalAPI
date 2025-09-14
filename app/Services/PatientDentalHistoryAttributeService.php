<?php

namespace App\Services;

use App\Models\PatientDentalHistoryAttribute;
use App\Http\Resources\PatientDentalHistoryAttributeResource;
use App\Models\Patient;

class PatientDentalHistoryAttributeService
{
    /**
     * Get a paginated list of Patient Dental History Attributes.
     *
     * @param int $perPage
     * @return array
     */
    public function getAttributes(Patient $patient, int $perPage): array
    {
        // Fetch the attributes from the database with pagination
        $data = PatientDentalHistoryAttribute::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'attributes' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createHistoryAttribute(array $data): PatientDentalHistoryAttribute
    {
        return PatientDentalHistoryAttribute::create($data);
    }

    public function updateHistoryAttribute(PatientDentalHistoryAttribute $pdha, array $data): PatientDentalHistoryAttribute
    {
        $pdha->update($data);
        $pdha->fresh();

        return $pdha;
    }
}
