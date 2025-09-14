<?php

namespace App\Services;

use App\Http\Resources\PatientCommunicationGroupResource;
use App\Models\PatientCommunicationGroup;

class PatientCommunicationGroupService
{
    public function getCommunicationGroup(int $perPage): array
    {
        // Fetch the attributes from the database with pagination
        $data = PatientCommunicationGroup::paginate($perPage);

        return [
            'group' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createCommunicationGroup(array $data): PatientCommunicationGroup
    {
        return PatientCommunicationGroup::create($data);
    }

    public function updateCommunicationGroup(PatientCommunicationGroup $pcg, array $data): PatientCommunicationGroup
    {
        $pcg->update($data);
        $pcg->fresh();

        return $pcg;
    }
}
