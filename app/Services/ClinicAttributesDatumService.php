<?php
namespace App\Services;

use App\Models\ClinicAttributesDatum;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicAttributesDatumResource;

class ClinicAttributesDatumService
{
    public function getClinicAttributesData(int $perPage): array
    {
        $data = ClinicAttributesDatum::paginate($perPage);

        return [
            'clinic_attributes_data' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_pages' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new clinic attribute data record.
     *
     * @param array $data The validated data for creating the clinic attribute data
     * @return ClinicAttributesDatum The newly created clinic attribute data model
     */
    public function createAttributeData(array $data): ClinicAttributesDatum
    {
        return ClinicAttributesDatum::create($data);
    }

    /**
     * Update an existing clinic attribute data record.
     *
     * @param ClinicAttributesDatum $clinicAttributesDatum The clinic attribute data model to update
     * @param array $data The validated data for updating the clinic attribute data
     * @return ClinicAttributesDatum The updated clinic attribute data model
     */
    public function updateAttributeData(ClinicAttributesDatum $clinicAttributesDatum, array $data): ClinicAttributesDatum
    {
        $clinicAttributesDatum->update($data);
        return $clinicAttributesDatum;
    }
}

