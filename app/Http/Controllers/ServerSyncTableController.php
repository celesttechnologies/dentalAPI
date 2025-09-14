<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServerSyncTableResource;
use App\Models\ServerSyncTable;
use App\Services\ServerSyncTableService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreServerSyncTableRequest;
use App\Http\Requests\UpdateServerSyncTableRequest;

class ServerSyncTableController extends Controller
{
    use ApiResponse;

    public function __construct(private ServerSyncTableService $syncTableService)
    {
    }

    /**
     * @group ServerSyncTable
     *
     * @method GET
     *
     * List all serversynctable
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "server_sync_tables": [
     *                 {
     *                     "server_table_sync_id": 1,
     *                     "table_name": "Example Name",
     *                     "primary_key": "Example value",
     *                     "is_to_be_sync": true,
     *                     "sync_order": "Example value",
     *                     "is_deleted": true,
     *                     "last_sync_time": "Example value",
     *                     "last_status_message": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "clinic_id": 1
     *                 }
     *             ],
     *             "pagination": {
     *                 "current_page": 1,
     *                 "per_pages": 50,
     *                 "total": 100
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->syncTableService->getServerSyncTables($perPage);

            return $this->successResponse([
                'server_sync_tables' => ServerSyncTableResource::collection($data['server_sync_tables']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Server Sync Tables: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group ServerSyncTable
     *
     * @method GET
     *
     * Create serversynctable
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "syncTable": {
     *                 "server_table_sync_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key": "Example value",
     *                 "is_to_be_sync": true,
     *                 "sync_order": "Example value",
     *                 "is_deleted": true,
     *                 "last_sync_time": "Example value",
     *                 "last_status_message": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncTableResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ServerSyncTable
     *
     * @method POST
     *
     * Create a new serversynctable
     *
     * @post /
     *
     * @bodyParam TableName string required. Example: "Example TableName"
     * @bodyParam PrimaryKey string required. Example: "Example PrimaryKey"
     * @bodyParam IsTobeSync string required. Example: "Example IsTobeSync"
     * @bodyParam SyncOrder string required. Example: "Example SyncOrder"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam LastSyncTime string required. Example: "Example LastSyncTime"
     * @bodyParam LastStatusMessage string required. Example: "Example LastStatusMessage"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "syncTable": {
     *                 "server_table_sync_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key": "Example value",
     *                 "is_to_be_sync": true,
     *                 "sync_order": "Example value",
     *                 "is_deleted": true,
     *                 "last_sync_time": "Example value",
     *                 "last_status_message": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncTableResource
     */
    public function store(StoreServerSyncTableRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $syncTable = $this->syncTableService->createSyncTable($validatedData);

            return $this->successResponse([
                'message' => 'Server sync table created successfully',
                'syncTable' => new ServerSyncTableResource($syncTable)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating server sync table: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create server sync table',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ServerSyncTable
     *
     * @method GET
     *
     * Get a specific serversynctable
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the serversynctable to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "syncTable": {
     *                 "server_table_sync_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key": "Example value",
     *                 "is_to_be_sync": true,
     *                 "sync_order": "Example value",
     *                 "is_deleted": true,
     *                 "last_sync_time": "Example value",
     *                 "last_status_message": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncTableResource
     */
    public function show(ServerSyncTable $serverSyncTable)
    {
        //
    }

    /**
     * @group ServerSyncTable
     *
     * @method GET
     *
     * Edit serversynctable
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the serversynctable to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "syncTable": {
     *                 "server_table_sync_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key": "Example value",
     *                 "is_to_be_sync": true,
     *                 "sync_order": "Example value",
     *                 "is_deleted": true,
     *                 "last_sync_time": "Example value",
     *                 "last_status_message": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncTableResource
     */
    public function edit(ServerSyncTable $serverSyncTable)
    {
        //
    }

    /**
     * @group ServerSyncTable
     *
     * @method PUT
     *
     * Update an existing serversynctable
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the serversynctable to update. Example: 1
     *
     * @bodyParam TableName string optional. Example: "Example TableName"
     * @bodyParam PrimaryKey string optional. Example: "Example PrimaryKey"
     * @bodyParam IsTobeSync string optional. Example: "Example IsTobeSync"
     * @bodyParam SyncOrder string optional. Example: "Example SyncOrder"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam LastSyncTime string optional. Example: "Example LastSyncTime"
     * @bodyParam LastStatusMessage string optional. Example: "Example LastStatusMessage"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "syncTable": {
     *                 "server_table_sync_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key": "Example value",
     *                 "is_to_be_sync": true,
     *                 "sync_order": "Example value",
     *                 "is_deleted": true,
     *                 "last_sync_time": "Example value",
     *                 "last_status_message": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncTableResource
     */
    public function update(UpdateServerSyncTableRequest $request, ServerSyncTable $serverSyncTable)
    {
        try {
            $validatedData = $request->validated();

            $updatedSyncTable = $this->syncTableService->updateSyncTable($serverSyncTable, $validatedData);

            return $this->successResponse([
                'message' => 'Server sync table updated successfully',
                'syncTable' => new ServerSyncTableResource($updatedSyncTable)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating server sync table: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update server sync table',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ServerSyncTable
     *
     * @method DELETE
     *
     * Delete a serversynctable
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the serversynctable to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServerSyncTable $serverSyncTable)
    {
        //
    }
}
