<?php

namespace App\Services;

use App\Models\PrescriptionTemplateMaster; // Assuming you have a PrescriptionTemplateMaster model
use App\Http\Resources\PrescriptionTemplateMasterResource; // Assuming you have a resource for Prescription Template Master
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PrescriptionTemplateMasterService
{
    /**
     * Get a paginated list of Prescription Template Masters.
     *
     * @param int $perPage
     * @return array
     */
    public function getPrescriptionTemplateMasters(int $perPage): array
    {
        $data = PrescriptionTemplateMaster::paginate($perPage); // Fetch paginated prescription template masters

        return [
            'prescription_template_masters' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

    /**
     * Create a new prescription template master record.
     *
     * @param array $data The validated data for creating the prescription template master
     * @return PrescriptionTemplateMaster The newly created prescription template master model
     */
    public function createPrescriptionTemplateMaster(array $data): PrescriptionTemplateMaster
    {
        return PrescriptionTemplateMaster::create($data);
    }

    /**
     * Update an existing prescription template master record.
     *
     * @param PrescriptionTemplateMaster $prescriptionTemplateMaster The prescription template master model to update
     * @param array $data The validated data for updating the prescription template master
     * @return PrescriptionTemplateMaster The updated prescription template master model
     */
    public function updatePrescriptionTemplateMaster(PrescriptionTemplateMaster $prescriptionTemplateMaster, array $data): PrescriptionTemplateMaster
    {
        $prescriptionTemplateMaster->update($data);
        return $prescriptionTemplateMaster;
    }
}
