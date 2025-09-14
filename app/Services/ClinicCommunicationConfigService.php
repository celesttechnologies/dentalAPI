<?php
namespace App\Services;

use App\Models\ClinicCommunicationConfig;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicCommunicationConfigResource;

class ClinicCommunicationConfigService
{
    public function getClinicCommunicationConfigs( $perPage): array
    {
            $data = ClinicCommunicationConfig::paginate($perPage);
    
            return [
                'clinic_communication_masters' => $data,
                'pagination' => [
                    'current_page' => $data->currentPage(),
                    'total_pages' => $data->lastPage(),
                    'total' => $data->total(),
                ]
            ];
        }

    /**
     * Create a new clinic communication config record.
     *
     * @param array $data The validated data for creating the clinic communication config
     * @return ClinicCommunicationConfig The newly created clinic communication config model
     */
    public function createClinicCommunicationConfig(array $data): ClinicCommunicationConfig
    {
        return ClinicCommunicationConfig::create($data);
    }

    /**
     * Update an existing clinic communication config record.
     *
     * @param ClinicCommunicationConfig $clinicCommunicationConfig The clinic communication config model to update
     * @param array $data The validated data for updating the clinic communication config
     * @return ClinicCommunicationConfig The updated clinic communication config model
     */
    public function updateClinicCommunicationConfig(ClinicCommunicationConfig $clinicCommunicationConfig, array $data): ClinicCommunicationConfig
    {
        $clinicCommunicationConfig->update($data);
        return $clinicCommunicationConfig;
    }
}