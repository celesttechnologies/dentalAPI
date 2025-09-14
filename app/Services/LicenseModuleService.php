<?php

namespace App\Services;

use App\Models\LicenseModule;
use App\Http\Resources\LicenseModuleResource;

class LicenseModuleService
{
    /**
     * Get a paginated list of License Modules.
     *
     * @param int $perPage
     * @return array
     */
    public function getLicenseModules(int $perPage): array
    {
        $data = LicenseModule::paginate($perPage);

        return [
            'modules' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
}
