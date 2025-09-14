<?php

namespace App\Services;

use App\Models\CTSecurity;
use App\Http\Resources\CTSecurityResource;

class CTSecurityService
{
    /**
     * Get a paginated list of CT securities.
     *
     * @param int $perPage
     * @return array
     */
    public function getCTSecurities(int $perPage): array
    {
        // Fetch paginated data from the CTSecurity model
        $data = CTSecurity::paginate($perPage);

        return [
            'ct_securities' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new security record.
     *
     * @param array $data The validated data for creating the security
     * @return CTSecurity The newly created security model
     */
    public function createSecurity(array $data): CTSecurity
    {
        return CTSecurity::create($data);
    }

    /**
     * Update an existing security record.
     *
     * @param CTSecurity $cTSecurity The security model to update
     * @param array $data The validated data for updating the security
     * @return CTSecurity The updated security model
     */
    public function updateSecurity(CTSecurity $cTSecurity, array $data): CTSecurity
    {
        $cTSecurity->update($data);
        return $cTSecurity;
    }
}