<?php

namespace App\Services;

use App\Models\ServerSyncTable; // Assuming you have a ServerSyncTable model
use App\Http\Resources\ServerSyncTableResource; // Assuming you have a resource for Server Sync Table
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServerSyncTableService
{
    /**
     * Get a paginated list of Server Sync Tables.
     *
     * @param int $perPage
     * @return array
     */
    public function getServerSyncTables(int $perPage): array
    {
        $data = ServerSyncTable::paginate($perPage); // Fetch paginated server sync tables

        return [
            'server_sync_tables' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
             
            ]
        ];
    }

    public function createSyncTable(array $data): ServerSyncTable
    {
        return ServerSyncTable::create($data);
    }

    public function updateSyncTable(ServerSyncTable $serverSyncTable, array $data): ServerSyncTable
    {
        $serverSyncTable->update($data);
        $serverSyncTable->fresh();

        return $serverSyncTable;
    }
}
