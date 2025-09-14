<?php

namespace App\Services;

use App\Models\TreatmentTypeHierarchy;
use Illuminate\Database\Eloquent\Builder;

class TreatmentTypeHierarchyService
{
    // Add your business logic for TreatmentTypeHierarchy here.
    public function getTreatmentTypeHierarchy($perPage = 50, $parentId = null)
    {
        if(is_null($parentId)) {
            $parentId = '00000000-0000-0000-0000-000000000000';
        }

        $treatmentTypeHierarchyList = TreatmentTypeHierarchy::when($parentId, function(Builder $query) use ($parentId) {
            $query->where('ParentTreatmentTypeID', $parentId);
        })->where('IsDeleted', 0)->paginate($perPage);

        return [
            'treatmentTypeHierarchy' => $treatmentTypeHierarchyList,
            'pagination' => [
                'currentPage' => $treatmentTypeHierarchyList->currentPage(),
                'perPage' => $treatmentTypeHierarchyList->perPage(),
                'total' => $treatmentTypeHierarchyList->total(),
            ]
        ];
    }

    /**
     * Create a new treatment type hierarchy record.
     *
     * @param array $data The validated data for creating the treatment type hierarchy
     * @return TreatmentTypeHierarchy The newly created treatment type hierarchy model
     */
    public function createHierarchy(array $data): TreatmentTypeHierarchy
    {
        return TreatmentTypeHierarchy::create($data);
    }

    /**
     * Update an existing treatment type hierarchy record.
     *
     * @param TreatmentTypeHierarchy $treatmentTypeHierarchy The treatment type hierarchy model to update
     * @param array $data The validated data for updating the treatment type hierarchy
     * @return TreatmentTypeHierarchy The updated treatment type hierarchy model
     */
    public function updateHierarchy(TreatmentTypeHierarchy $treatmentTypeHierarchy, array $data): TreatmentTypeHierarchy
    {
        $treatmentTypeHierarchy->update($data);
        return $treatmentTypeHierarchy;
    }
}
