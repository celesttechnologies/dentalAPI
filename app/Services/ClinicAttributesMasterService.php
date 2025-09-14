<?php
namespace App\Services;

use App\Models\ClinicAttributesMaster;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ClinicAttributesMasterResource;

class ClinicAttributesMasterService
{
    public function getClinicAttributesMasters( $perPage): array
    {
        $data = ClinicAttributesMaster::paginate($perPage);

        return [
            'clinic_attributes_masters' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new attributes master record.
     *
     * @param array $data The validated data for creating the attributes master
     * @return ClinicAttributesMaster The newly created attributes master model
     */
    public function createAttributesMaster(array $data): ClinicAttributesMaster
    {
        return ClinicAttributesMaster::create($data);
    }

    /**
     * Update an existing attributes master record.
     *
     * @param ClinicAttributesMaster $clinicAttributesMaster The attributes master model to update
     * @param array $data The validated data for updating the attributes master
     * @return ClinicAttributesMaster The updated attributes master model
     */
    public function updateAttributesMaster(ClinicAttributesMaster $clinicAttributesMaster, array $data): ClinicAttributesMaster
    {
        $clinicAttributesMaster->update($data);
        return $clinicAttributesMaster;
    }
}
