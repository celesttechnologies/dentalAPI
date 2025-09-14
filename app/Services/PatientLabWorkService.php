<?php

namespace App\Services;

use App\Models\PatientLabWork; // Assuming you have a PatientLabWork model
use App\Http\Resources\PatientLabWorkResource; // Assuming you have a resource for Patient Lab Work
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientLabWorkService
{
    /**
     * Get a paginated list of Patient Lab Works.
     *
     * @param int $perPage
     * @return array
     */
    public function getLabWorks(int $perPage): array
    {
        $data = PatientLabWork::paginate($perPage); // Fetch paginated lab works

        return [
            'lab_works' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                
            ]
        ];
    }

    /**
     * Create a new invoice detail record.
     *
     * @param array $data The validated data for creating the invoice detail
     * @return PatientLabWork The newly created invoice detail model
     */
    public function createLabWork(array $data): PatientLabWork
    {
        return PatientLabWork::create($data);
    }

    /**
     * Update an existing invoice detail record.
     *
     * @param PatientLabWork $patientInvoicesDetail The invoice detail model to update
     * @param array $data The validated data for updating the invoice detail
     * @return PatientLabWork The updated invoice detail model
     */
    public function updateLabWork(PatientLabWork $patientLabWork, array $data): PatientLabWork
    {
        $patientLabWork->update($data);
        $patientLabWork->fresh();
        
        return $patientLabWork;
    }
}