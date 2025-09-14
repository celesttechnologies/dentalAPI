<?php

namespace App\Services;

use App\Models\ECGConfigChannel;
use App\Http\Resources\ECGConfigChannelResource;
use Illuminate\Pagination\LengthAwarePaginator;

class ECGConfigChannelService
{
    /**
     * Get a paginated list of ECG config channels.
     *
     * @param int $perPage
     * @return array
     */
    public function getConfigChannels(int $perPage): array
    {
        // Fetch paginated data from the ECGConfigChannel model
        $data = ECGConfigChannel::paginate($perPage);

        return [
            'config_channels' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new config channel record.
     *
     * @param array $data The validated data for creating the config channel
     * @return ECGConfigChannel The newly created config channel model
     */
    public function createConfigChannel(array $data): ECGConfigChannel
    {
        return ECGConfigChannel::create($data);
    }

    /**
     * Update an existing config channel record.
     *
     * @param ECGConfigChannel $eCGConfigChannel The config channel model to update
     * @param array $data The validated data for updating the config channel
     * @return ECGConfigChannel The updated config channel model
     */
    public function updateConfigChannel(ECGConfigChannel $eCGConfigChannel, array $data): ECGConfigChannel
    {
        $eCGConfigChannel->update($data);
        return $eCGConfigChannel;
    }
}
