<?php

namespace App\Services;

use App\Http\Resources\PatientAllergyAttributeResource;
use App\Models\PatientAllergyAttribute;

class PatientAllergyAttributeService
{
    public function getAllergyAttributes($patient, int $perPage): array
    {
        // Fetch the attributes from the database with pagination
        $data = PatientAllergyAttribute::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'attributes' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createAllergyAttribute(array $data): PatientAllergyAttribute
    {
        return PatientAllergyAttribute::create($data);
    }

    public function updateAllergyAttribute(PatientAllergyAttribute $paa, array $data): PatientAllergyAttribute
    {
        $paa->update($data);
        $paa->fresh();

        return $paa;
    }
}
