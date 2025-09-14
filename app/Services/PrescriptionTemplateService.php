<?php

namespace App\Services;

use App\Models\PrescriptionTemplate; // Assuming you have a PrescriptionTemplate model
use App\Http\Resources\PrescriptionTemplateResource; // Assuming you have a resource for Prescription Template
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PrescriptionTemplateService
{
    /**
     * Get a paginated list of Prescription Templates.
     *
     * @param int $perPage
     * @return array
     */
    public function getPrescriptionTemplates(int $perPage): array
    {
        $data = PrescriptionTemplate::paginate($perPage); // Fetch paginated prescription templates

        return [
            'prescription_templates' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

    /**
     * Create a new prescription template record.
     *
     * @param array $data The validated data for creating the prescription template
     * @return PrescriptionTemplate The newly created prescription template model
     */
    public function createPrescriptionTemplate(array $data): PrescriptionTemplate
    {
        return PrescriptionTemplate::create($data);
    }

    /**
     * Update an existing prescription template record.
     *
     * @param PrescriptionTemplate $prescriptionTemplate The prescription template model to update
     * @param array $data The validated data for updating the prescription template
     * @return PrescriptionTemplate The updated prescription template model
     */
    public function updatePrescriptionTemplate(PrescriptionTemplate $prescriptionTemplate, array $data): PrescriptionTemplate
    {
        $prescriptionTemplate->update($data);
        return $prescriptionTemplate;
    }
}