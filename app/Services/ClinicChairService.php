<?php
namespace App\Services;

use App\Models\ClinicChair;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicChairResource;

class ClinicChairService
{
    public function getClinicChairs(int $perPage): array
    {
        $data = ClinicChair::paginate($perPage);

        return [
            'clinic_chairs' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new clinic chair record.
     *
     * @param array $data The validated data for creating the clinic chair
     * @return ClinicChair The newly created clinic chair model
     */
    public function createClinicChair(array $data): ClinicChair
    {
        return ClinicChair::create($data);
    }

    /**
     * Update an existing clinic chair record.
     *
     * @param ClinicChair $clinicChair The clinic chair model to update
     * @param array $data The validated data for updating the clinic chair
     * @return ClinicChair The updated clinic chair model
     */
    public function updateClinicChair(ClinicChair $clinicChair, array $data): ClinicChair
    {
        $clinicChair->update($data);
        return $clinicChair;
    }
}