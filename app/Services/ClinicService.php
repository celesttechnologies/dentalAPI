<?php
namespace App\Services;

use App\Models\Clinic;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicResource;

class ClinicService
{
    public function getClinics(int $perPage): array
    {
        $data = Clinic::paginate($perPage);

        return [
            'clinics' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_pages' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new clinic record.
     *
     * @param array $data The validated data for creating the clinic
     * @return Clinic The newly created clinic model
     */
    public function createClinic(array $data): Clinic
    {
        return Clinic::create($data);
    }

    /**
     * Update an existing clinic record.
     *
     * @param Clinic $clinic The clinic model to update
     * @param array $data The validated data for updating the clinic
     * @return Clinic The updated clinic model
     */
    public function updateClinic(Clinic $clinic, array $data): Clinic
    {
        $clinic->update($data);
        return $clinic;
    }
}