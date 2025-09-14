<?php

namespace App\Services;

use App\Models\ClinicModulesAccess;
use App\Http\Resources\ClinicModulesAccessResource;

class ClinicModulesAccessService
{
    public function getClinicModulesAccess($perPage): array
    {
        // Fetch paginated data from the ClinicModulesAccess model
        $data = ClinicModulesAccess::paginate($perPage);

        return [
            'clinic_modules_access' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_pages' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    /**
     * Create a new modules access record.
     *
     * @param array $data The validated data for creating the modules access
     * @return ClinicModulesAccess The newly created modules access model
     */
    public function createModulesAccess(array $data): ClinicModulesAccess
    {
        return ClinicModulesAccess::create($data);
    }

    /**
     * Update an existing modules access record.
     *
     * @param ClinicModulesAccess $clinicModulesAccess The modules access model to update
     * @param array $data The validated data for updating the modules access
     * @return ClinicModulesAccess The updated modules access model
     */
    public function updateModulesAccess(ClinicModulesAccess $clinicModulesAccess, array $data): ClinicModulesAccess
    {
        $clinicModulesAccess->update($data);
        $clinicModulesAccess->fresh();
        return $clinicModulesAccess;
    }
}