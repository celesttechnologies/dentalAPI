<?php

namespace App\Services;

use App\Models\ECGWebRequest;
use App\Http\Resources\ECGWebRequestResource;

class ECGWebRequestService
{
    /**
     * Get a paginated list of ECG Web Requests.
     *
     * @param int $perPage
     * @return array
     */
    public function getWebRequests(int $perPage): array
    {
        // Fetch paginated data from the ECGWebRequest model
        $data = ECGWebRequest::paginate($perPage);

        return [
            'web_requests' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    public function createWebRequest(array $data): ECGWebRequest
    {
        return ECGWebRequest::create($data);
    }

    public function updateWebRequest(ECGWebRequest $webRequest, array $data): ECGWebRequest
    {
        $webRequest->update($data);
        $webRequest->fresh();
        return $webRequest;
    }
}