<?php

namespace App\Services;

use App\Models\ServerSyncDatum; // Assuming you have a ServerSyncDatum model
use App\Http\Resources\ServerSyncDatumResource; // Assuming you have a resource for Server Sync Datum
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class ServerSyncDatumService
{
    /**
     * Get a paginated list of Server Sync Data.
     *
     * @param int $perPage
     * @return array
     */
    public function getServerSyncData(int $perPage): array
    {
        $data = ServerSyncDatum::paginate($perPage); // Fetch paginated server sync data

        return [
            'server_sync_data' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new server sync data record.
     *
     * @param array $data The validated data for creating the server sync data
     * @return ServerSyncDatum The newly created server sync data model
     */
    public function createServerSyncData(array $data): ServerSyncDatum
    {
        return ServerSyncDatum::create($data);
    }

    /**
     * Update an existing server sync data record.
     *
     * @param ServerSyncDatum $serverSyncDatum The server sync data model to update
     * @param array $data The validated data for updating the server sync data
     * @return ServerSyncDatum The updated server sync data model
     */
    public function updateServerSyncData(ServerSyncDatum $serverSyncDatum, array $data): ServerSyncDatum
    {
        $serverSyncDatum->update($data);
        return $serverSyncDatum;
    }
}