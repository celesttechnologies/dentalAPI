<?php

namespace App\Services;

use App\Models\ECGSupportQuery;
use App\Http\Resources\ECGSupportQueryResource;

class ECGSupportQueryService
{
    /**
     * Get a paginated list of ECG Support Queries.
     *
     * @param int $perPage
     * @return array
     */
    public function getSupportQueries(int $perPage): array
    {
        // Fetch paginated data from the ECGSupportQuery model
        $data = ECGSupportQuery::paginate($perPage);

        return [
            'support_queries' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    public function createQuery(array $data): ECGSupportQuery
    {
        return ECGSupportQuery::create($data);
    }

    public function updateQuery(ECGSupportQuery $ecgsq, array $data): ECGSupportQuery
    {
        $ecgsq->update($data);
        $ecgsq->fresh();
        return $ecgsq;
    }
}