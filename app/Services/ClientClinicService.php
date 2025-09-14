<?php
namespace App\Services;

use App\Models\ClientClinic;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientClinicService
{
    public function getClientClinics($perPage): array
    {
        $clientClinics = ClientClinic::paginate($perPage);

        return [
            'clientClinics' => $clientClinics->items(),
            'pagination' => [
                'current_page' => $clientClinics->currentPage(),
                'per_page' => $clientClinics->perPage(),
                'total' => $clientClinics->total(),
            ]
        ];
    }

    /**
     * Create a new client clinic record.
     *
     * @param array $data The validated data for creating the client clinic
     * @return ClientClinic The newly created client clinic model
     */
    public function createClientClinic(array $data): ClientClinic
    {
        return ClientClinic::create($data);
    }

    /**
     * Update an existing client clinic record.
     *
     * @param ClientClinic $clientClinic The client clinic model to update
     * @param array $data The validated data for updating the client clinic
     * @return ClientClinic The updated client clinic model
     */
    public function updateClientClinic(ClientClinic $clientClinic, array $data): ClientClinic
    {
        $clientClinic->update($data);
        return $clientClinic;
    }
}