<?php

namespace App\Services;

use App\Models\ClinicLabWorkDetail;
use App\Http\Resources\ClinicLabWorkDetailResource;

class ClinicLabWorkDetailService
{
    public function getClinicLabWorkDetails($perPage): array
    {
        // Fetch paginated data from the ClinicLabWorkDetail model
        $data = ClinicLabWorkDetail::paginate($perPage);

        return [
            'clinic_lab_work_details' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    /**
     * Create a new clinic lab work detail record.
     *
     * @param array $data The validated data for creating the clinic lab work detail
     * @return ClinicLabWorkDetail The newly created clinic lab work detail model
     */
    public function createLabWorkDetail(array $data): ClinicLabWorkDetail
    {
        return ClinicLabWorkDetail::create($data);
    }

    /**
     * Update an existing clinic lab work detail record.
     *
     * @param ClinicLabWorkDetail $clinicLabWorkDetail The clinic lab work detail model to update
     * @param array $data The validated data for updating the clinic lab work detail
     * @return ClinicLabWorkDetail The updated clinic lab work detail model
     */
    public function updateLabWorkDetail(ClinicLabWorkDetail $clinicLabWorkDetail, array $data): ClinicLabWorkDetail
    {
        $clinicLabWorkDetail->update($data);
        return $clinicLabWorkDetail;
    }
}