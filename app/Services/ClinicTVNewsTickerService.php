<?php

namespace App\Services;

use App\Models\ClinicTVNewsTicker;
use App\Http\Resources\ClinicTVNewsTickerResource;

class ClinicTVNewsTickerService
{
    public function getClinicTVNewsTickers(int $perPage): array
    {
        // Fetch paginated data from the ClinicTVNewsTicker model
        $data = ClinicTVNewsTicker::paginate($perPage);

        return [
            'clinic_tv_news_tickers' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new news ticker record.
     *
     * @param array $data The validated data for creating the news ticker
     * @return ClinicTVNewsTicker The newly created news ticker model
     */
    public function createNewsTicker(array $data): ClinicTVNewsTicker
    {
        return ClinicTVNewsTicker::create($data);
    }

    /**
     * Update an existing news ticker record.
     *
     * @param ClinicTVNewsTicker $clinicTVNewsTicker The news ticker model to update
     * @param array $data The validated data for updating the news ticker
     * @return ClinicTVNewsTicker The updated news ticker model
     */
    public function updateNewsTicker(ClinicTVNewsTicker $clinicTVNewsTicker, array $data): ClinicTVNewsTicker
    {
        $clinicTVNewsTicker->update($data);
        return $clinicTVNewsTicker;
    }
}
