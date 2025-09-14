<?php

namespace App\Services;

use App\Http\Resources\DrugResource;
use App\Models\Drug;

class DrugService
{
    // Add your business logic for Drug here.
    public function getDrugs($perPage = 50)
    {
        $drugList = Drug::paginate($perPage);
        return [
            'drugs' => $drugList,
            'pagination' => [
                'currentPage' => $drugList->currentPage(),
                'perPage' => $drugList->perPage(),
                'total' => $drugList->total(),
            ]
        ];
    }

    /**
     * Create a new drug record.
     *
     * @param array $data The validated data for creating the drug
     * @return Drug The newly created drug model
     */
    public function createDrug(array $data): Drug
    {
        return Drug::create($data);
    }

    /**
     * Update an existing drug record.
     *
     * @param Drug $drug The drug model to update
     * @param array $data The validated data for updating the drug
     * @return Drug The updated drug model
     */
    public function updateDrug(Drug $drug, array $data): Drug
    {
        $drug->update($data);
        return $drug;
    }
}
