<?php

namespace App\Services;

use App\Models\SMSSituation;
use App\Http\Resources\SMSSituationResource;
use Illuminate\Pagination\LengthAwarePaginator;

class SMSSituationService
{
    /**
     * Get a paginated list of SMS Situations.
     *
     * @param int $perPage
     * @return array
     */
    public function getSMSSituations(int $perPage): array
    {
        $data = SMSSituation::paginate($perPage);

        return [
            'sms_situations' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new SMS situation record.
     *
     * @param array $data The validated data for creating the SMS situation
     * @return SMSSituation The newly created SMS situation model
     */
    public function createSMSSituation(array $data): SMSSituation
    {
        return SMSSituation::create($data);
    }

    /**
     * Update an existing SMS situation record.
     *
     * @param SMSSituation $sMSSituation The SMS situation model to update
     * @param array $data The validated data for updating the SMS situation
     * @return SMSSituation The updated SMS situation model
     */
    public function updateSMSSituation(SMSSituation $sMSSituation, array $data): SMSSituation
    {
        $sMSSituation->update($data);
        return $sMSSituation;
    }
}

