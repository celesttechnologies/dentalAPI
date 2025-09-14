<?php
namespace App\Services;

use App\Models\ClinicCommunicationMaster;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicCommunicationMasterResource;

class ClinicCommunicationMasterService
{
    public function getClinicCommunicationMasters(int $perPage): array
    {
        $data = ClinicCommunicationMaster::paginate($perPage);

        return [
            'clinic_communication_masters' => $data,
            'pagination' => [
               'current_page' => $data->currentPage(),
                    'total_pages' => $data->lastPage(),
                    'total'=>$data->total(),
            ]
        ];
    }

    /**
     * Create a new clinic communication master record.
     *
     * @param array $data The validated data for creating the clinic communication master
     * @return ClinicCommunicationMaster The newly created clinic communication master model
     */
    public function createClinicCommunicationMaster(array $data): ClinicCommunicationMaster
    {
        return ClinicCommunicationMaster::create($data);
    }

    /**
     * Update an existing clinic communication master record.
     *
     * @param ClinicCommunicationMaster $clinicCommunicationMaster The clinic communication master model to update
     * @param array $data The validated data for updating the clinic communication master
     * @return ClinicCommunicationMaster The updated clinic communication master model
     */
    public function updateClinicCommunicationMaster(ClinicCommunicationMaster $clinicCommunicationMaster, array $data): ClinicCommunicationMaster
    {
        $clinicCommunicationMaster->update($data);
        return $clinicCommunicationMaster;
    }
}
