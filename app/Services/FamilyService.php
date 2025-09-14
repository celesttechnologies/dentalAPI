<?php

namespace App\Services;

use App\Models\Family;
use App\Http\Resources\FamilyResource;

class FamilyService
{
    /**
     * Get a paginated list of Families.
     *
     * @param int $perPage
     * @return array
     */
    public function getFamilies(int $perPage): array
    {
        $data = Family::paginate($perPage);

        return [
            'families' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createFamily(array $data): Family
    {
        return Family::create($data);
    }

    public function updateFamily(Family $family, array $data): Family
    {
        $family->update($data);
        $family->fresh();
        
        return $family;
    }
}