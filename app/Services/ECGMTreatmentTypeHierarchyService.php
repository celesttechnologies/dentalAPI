<?php

namespace App\Services;

use App\Models\ECGMTreatmentTypeHierarchy;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ECGMTreatmentTypeHierarchyResource;

class ECGMTreatmentTypeHierarchyService
{
    /**
     * Get a paginated list of ECGM treatment types.
     *
     * @param int $perPage
     * @return array
     */
    public function getTreatmentTypes(int $perPage): array
    {
        // Fetch paginated data from the ECGMTreatmentTypeHierarchy model
        $data = ECGMTreatmentTypeHierarchy::paginate($perPage);

        return [
            'treatment_types' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new treatment type hierarchy record.
     *
     * @param array $data The validated data for creating the treatment type hierarchy
     * @return ECGMTreatmentTypeHierarchy The newly created treatment type hierarchy model
     */
    public function createHierarchy(array $data): ECGMTreatmentTypeHierarchy
    {
        return ECGMTreatmentTypeHierarchy::create($data);
    }

    /**
     * Update an existing treatment type hierarchy record.
     *
     * @param ECGMTreatmentTypeHierarchy $eCGMTreatmentTypeHierarchy The treatment type hierarchy model to update
     * @param array $data The validated data for updating the treatment type hierarchy
     * @return ECGMTreatmentTypeHierarchy The updated treatment type hierarchy model
     */
    public function updateHierarchy(ECGMTreatmentTypeHierarchy $eCGMTreatmentTypeHierarchy, array $data): ECGMTreatmentTypeHierarchy
    {
        $eCGMTreatmentTypeHierarchy->update($data);
        return $eCGMTreatmentTypeHierarchy;
    }
}
