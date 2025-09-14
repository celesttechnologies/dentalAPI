<?php

namespace App\Services;

use App\Models\ClinicSearchAgent;
use App\Http\Resources\ClinicSearchAgentResource;

class ClinicSearchAgentService
{
    public function getClinicSearchAgents($perPage): array
    {
        // Fetch paginated data from the ClinicSearchAgent model
        $data = ClinicSearchAgent::paginate($perPage);

        return [
            'clinic_search_agents' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new search agent record.
     *
     * @param array $data The validated data for creating the search agent
     * @return ClinicSearchAgent The newly created search agent model
     */
    public function createSearchAgent(array $data): ClinicSearchAgent
    {
        return ClinicSearchAgent::create($data);
    }

    /**
     * Update an existing search agent record.
     *
     * @param ClinicSearchAgent $clinicSearchAgent The search agent model to update
     * @param array $data The validated data for updating the search agent
     * @return ClinicSearchAgent The updated search agent model
     */
    public function updateSearchAgent(ClinicSearchAgent $clinicSearchAgent, array $data): ClinicSearchAgent
    {
        $clinicSearchAgent->update($data);
        return $clinicSearchAgent;
    }
}