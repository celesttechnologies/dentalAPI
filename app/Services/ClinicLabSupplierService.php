<?php
namespace App\Services;

use App\Models\ClinicLabSupplier;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicLabSupplierResource;

class ClinicLabSupplierService
{
    public function getClinicLabSuppliers(int $perPage): array
    {
        $data = ClinicLabSupplier::paginate($perPage);

        return [
            'clinic_lab_suppliers' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new lab supplier record.
     *
     * @param array $data The validated data for creating the lab supplier
     * @return ClinicLabSupplier The newly created lab supplier model
     */
    public function createLabSupplier(array $data): ClinicLabSupplier
    {
        return ClinicLabSupplier::create($data);
    }

    /**
     * Update an existing lab supplier record.
     *
     * @param ClinicLabSupplier $clinicLabSupplier The lab supplier model to update
     * @param array $data The validated data for updating the lab supplier
     * @return ClinicLabSupplier The updated lab supplier model
     */
    public function updateLabSupplier(ClinicLabSupplier $clinicLabSupplier, array $data): ClinicLabSupplier
    {
        $clinicLabSupplier->update($data);
        return $clinicLabSupplier;
    }
}