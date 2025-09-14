<?php

namespace App\Services;

use App\Models\ECGConfigChannelInformation;
use App\Http\Resources\ECGConfigChannelInformationResource;
use Illuminate\Pagination\LengthAwarePaginator;

class ECGConfigChannelInformationService
{
    /**
     * Get a paginated list of ECG config channel information.
     *
     * @param int $perPage
     * @return array
     */
    public function getChannelInformation(int $perPage): array
    {
        // Fetch paginated data from the ECGConfigChannelInformation model
        $data = ECGConfigChannelInformation::paginate($perPage);

        return [
            'channel_information' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new channel information record.
     *
     * @param array $data The validated data for creating the channel information
     * @return ECGConfigChannelInformation The newly created channel information model
     */
    public function createChannelInformation(array $data): ECGConfigChannelInformation
    {
        return ECGConfigChannelInformation::create($data);
    }

    /**
     * Update an existing channel information record.
     *
     * @param ECGConfigChannelInformation $eCGConfigChannelInformation The channel information model to update
     * @param array $data The validated data for updating the channel information
     * @return ECGConfigChannelInformation The updated channel information model
     */
    public function updateChannelInformation(ECGConfigChannelInformation $eCGConfigChannelInformation, array $data): ECGConfigChannelInformation
    {
        $eCGConfigChannelInformation->update($data);
        return $eCGConfigChannelInformation;
    }
}