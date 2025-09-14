<?php

namespace App\Services;

use App\Models\DWSConfigClinicTiming;
use App\Http\Resources\DWSConfigClinicTimingResource;

class DWSConfigClinicTimingService
{
    /**
     * Get a paginated list of clinic timings.
     *
     * @param int $perPage
     * @return array
     */
    public function getClinicTimings(int $perPage): array
    {
        // Fetch paginated data from the DWSConfigClinicTiming model
        $data = DWSConfigClinicTiming::paginate($perPage);

        return [
            'clinic_timings' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new clinic timing record.
     *
     * @param array $data The validated data for creating the clinic timing
     * @return DWSConfigClinicTiming The newly created clinic timing model
     */
    public function createClinicTiming(array $data): DWSConfigClinicTiming
    {
        return DWSConfigClinicTiming::create($data);
    }

    /**
     * Update an existing clinic timing record.
     *
     * @param DWSConfigClinicTiming $dWSConfigClinicTiming The clinic timing model to update
     * @param array $data The validated data for updating the clinic timing
     * @return DWSConfigClinicTiming The updated clinic timing model
     */
    public function updateClinicTiming(DWSConfigClinicTiming $dWSConfigClinicTiming, array $data): DWSConfigClinicTiming
    {
        $dWSConfigClinicTiming->update($data);
        return $dWSConfigClinicTiming;
    }
}