<?php

namespace App\Services;

use App\Models\EcgExternalRefferalDatum;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\EcgExternalRefferalDatumResource;

class EcgExternalRefferalDatumService
{
    /**
     * Get a paginated list of ECG external referral data.
     *
     * @param int $perPage
     * @return array
     */
    public function getExternalReferralData(int $perPage): array
    {
        // Fetch paginated data from the EcgExternalRefferalDatum model
        $data = EcgExternalRefferalDatum::paginate($perPage);

        return [
            'external_referrals' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new external refferal datum record.
     *
     * @param array $data The validated data for creating the external refferal datum
     * @return EcgExternalRefferalDatum The newly created external refferal datum model
     */
    public function createRefferalDatum(array $data): EcgExternalRefferalDatum
    {
        return EcgExternalRefferalDatum::create($data);
    }

    /**
     * Update an existing external refferal datum record.
     *
     * @param EcgExternalRefferalDatum $ecgExternalRefferalDatum The external refferal datum model to update
     * @param array $data The validated data for updating the external refferal datum
     * @return EcgExternalRefferalDatum The updated external refferal datum model
     */
    public function updateRefferalDatum(EcgExternalRefferalDatum $ecgExternalRefferalDatum, array $data): EcgExternalRefferalDatum
    {
        $ecgExternalRefferalDatum->update($data);
        return $ecgExternalRefferalDatum;
    }
}
