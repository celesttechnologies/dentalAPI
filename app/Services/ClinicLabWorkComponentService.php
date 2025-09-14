<?php
namespace App\Services;

use App\Models\ClinicLabWorkComponent;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicLabWorkComponentResource;

class ClinicLabWorkComponentService
{
    public function getClinicLabWorkComponents(int $perPage): array
    {
        $data = ClinicLabWorkComponent::paginate($perPage);

        return [
            'clinic_lab_work_components' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new lab work component record.
     *
     * @param array $data The validated data for creating the lab work component
     * @return ClinicLabWorkComponent The newly created lab work component model
     */
    public function createLabWorkComponent(array $data): ClinicLabWorkComponent
    {
        return ClinicLabWorkComponent::create($data);
    }

    /**
     * Update an existing lab work component record.
     *
     * @param ClinicLabWorkComponent $clinicLabWorkComponent The lab work component model to update
     * @param array $data The validated data for updating the lab work component
     * @return ClinicLabWorkComponent The updated lab work component model
     */
    public function updateLabWorkComponent(ClinicLabWorkComponent $clinicLabWorkComponent, array $data): ClinicLabWorkComponent
    {
        $clinicLabWorkComponent->update($data);
        return $clinicLabWorkComponent;
    }
}
