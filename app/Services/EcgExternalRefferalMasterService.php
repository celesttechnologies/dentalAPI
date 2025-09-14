<?php

namespace App\Services;

use App\Models\EcgExternalRefferalMaster;
use App\Http\Resources\EcgExternalRefferalMasterResource;

class EcgExternalRefferalMasterService
{
    /**
     * Get a paginated list of ECG external referral masters.
     *
     * @param int $perPage
     * @return array
     */
    public function getExternalReferralMasters(int $perPage): array
    {
        // Fetch paginated data from the EcgExternalRefferalMaster model
        $data = EcgExternalRefferalMaster::paginate($perPage);

        return [
            'external_referral_masters' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * create an ecg external referral master.
     *
     * @param array $data The validated data for creating the event
     * @return EcgExternalRefferalMaster The newly created event model
     */
    public function createRefferalMaster(array $data): EcgExternalRefferalMaster
    {
        return EcgExternalRefferalMaster::create($data);
    }

    /**
     * update an ecg external referral master.
     *
     * @param EcgExternalRefferalMaster $ecgActivityEvent The event model to update
     * @param array $data The validated data for updating the event
     * @return EcgExternalRefferalMaster The updated event model
     */
    public function updateRefferalMaster(EcgExternalRefferalMaster $request, array $data): EcgExternalRefferalMaster
    {
        $request->update($data);
        $request->fresh($data);

        return $request;
    }
}