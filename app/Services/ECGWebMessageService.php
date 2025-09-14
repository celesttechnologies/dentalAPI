<?php

namespace App\Services;

use App\Models\ECGWebMessage;
use App\Http\Resources\ECGWebMessageResource;

class ECGWebMessageService
{
    /**
     * Get a paginated list of ECG Web Messages.
     *
     * @param int $perPage
     * @return array
     */
    public function getWebMessages(int $perPage): array
    {
        // Fetch paginated data from the ECGWebMessage model
        $data = ECGWebMessage::paginate($perPage);

        return [
            'web_messages' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new ECG Web Message.
     *
     * @param array $data
     * @return ECGWebMessage
     */
    public function createWebMessage(array $data): ECGWebMessage
    {
        return ECGWebMessage::create($data);
    }

    /**
     * Update an existing ECG Web Message.
     *
     * @param ECGWebMessage $webMessage
     * @param array $data
     * @return ECGWebMessage
     */
    public function updateWebMessage(ECGWebMessage $webMessage, array $data): ECGWebMessage
    {
        $webMessage->update($data);
        return $webMessage->fresh();
    }
}