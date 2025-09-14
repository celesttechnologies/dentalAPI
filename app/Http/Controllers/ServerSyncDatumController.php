<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServerSyncDatumResource; // Assuming you have a resource for Server Sync Datum
use App\Models\ServerSyncDatum;
use App\Services\ServerSyncDatumService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreServerSyncDatumRequest;
use App\Http\Requests\UpdateServerSyncDatumRequest;

class ServerSyncDatumController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private ServerSyncDatumService $serverSyncDatumService)
    {
    }

    /**
     * @group ServerSyncDatum
     *
     * @method GET
     *
     * List all serversyncdatum
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "server_sync_data": [
     *                 {
     *                     "server_sync_primary_id": 1,
     *                     "clinic_id": 1,
     *                     "table_name": "Example Name",
     *                     "primary_key_column_name": "Example Name",
     *                     "primary_key_id": 1,
     *                     "row_guid": 1,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "is_created_exported": true,
     *                     "is_created_exported_on": true,
     *                     "is_last_updated_exported": true,
     *                     "is_last_updated_exported_on": true,
     *                     "row_data": "Example value"
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
            $data = $this->serverSyncDatumService->getServerSyncData($perPage);

            return $this->successResponse([
                'server_sync_data' => ServerSyncDatumResource::collection($data['server_sync_data']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Server Sync Data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @group ServerSyncDatum
     *
     * @method GET
     *
     * Create serversyncdatum
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sync_data": {
     *                 "server_sync_primary_id": 1,
     *                 "clinic_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key_column_name": "Example Name",
     *                 "primary_key_id": 1,
     *                 "row_guid": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "is_created_exported": true,
     *                 "is_created_exported_on": true,
     *                 "is_last_updated_exported": true,
     *                 "is_last_updated_exported_on": true,
     *                 "row_data": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncDatumResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ServerSyncDatum
     *
     * @method POST
     *
     * Create a new serversyncdatum
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam TableName string required. Example: "Example TableName"
     * @bodyParam PrimaryKeyColumnName string required. Example: "Example PrimaryKeyColumnName"
     * @bodyParam PrimaryKeyID string required. Maximum length: 255. Example: "Example PrimaryKeyID"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam IsCreatedExported string required. Example: "Example IsCreatedExported"
     * @bodyParam IsCreatedExportedOn string required. Example: "Example IsCreatedExportedOn"
     * @bodyParam IsLastUpdatedExported string required. date. Example: "Example IsLastUpdatedExported"
     * @bodyParam IsLastUpdatedExportedOn string required. date. Example: "Example IsLastUpdatedExportedOn"
     * @bodyParam RowData string required. Example: "Example RowData"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "sync_data": {
     *                 "server_sync_primary_id": 1,
     *                 "clinic_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key_column_name": "Example Name",
     *                 "primary_key_id": 1,
     *                 "row_guid": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "is_created_exported": true,
     *                 "is_created_exported_on": true,
     *                 "is_last_updated_exported": true,
     *                 "is_last_updated_exported_on": true,
     *                 "row_data": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncDatumResource
     */
    public function store(StoreServerSyncDatumRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $syncData = $this->serverSyncDatumService->createServerSyncData($validatedData);

            return $this->successResponse([
                'message' => 'Server Sync Data created successfully',
                'sync_data' => new ServerSyncDatumResource($syncData)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating Server Sync Data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create Server Sync Data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ServerSyncDatum
     *
     * @method GET
     *
     * Get a specific serversyncdatum
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the serversyncdatum to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sync_data": {
     *                 "server_sync_primary_id": 1,
     *                 "clinic_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key_column_name": "Example Name",
     *                 "primary_key_id": 1,
     *                 "row_guid": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "is_created_exported": true,
     *                 "is_created_exported_on": true,
     *                 "is_last_updated_exported": true,
     *                 "is_last_updated_exported_on": true,
     *                 "row_data": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncDatumResource
     */
    public function show(ServerSyncDatum $serverSyncDatum)
    {
        //
    }

    /**
     * @group ServerSyncDatum
     *
     * @method GET
     *
     * Edit serversyncdatum
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the serversyncdatum to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sync_data": {
     *                 "server_sync_primary_id": 1,
     *                 "clinic_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key_column_name": "Example Name",
     *                 "primary_key_id": 1,
     *                 "row_guid": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "is_created_exported": true,
     *                 "is_created_exported_on": true,
     *                 "is_last_updated_exported": true,
     *                 "is_last_updated_exported_on": true,
     *                 "row_data": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncDatumResource
     */
    public function edit(ServerSyncDatum $serverSyncDatum)
    {
        //
    }

    /**
     * @group ServerSyncDatum
     *
     * @method PUT
     *
     * Update an existing serversyncdatum
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the serversyncdatum to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam TableName string optional. Example: "Example TableName"
     * @bodyParam PrimaryKeyColumnName string optional. Example: "Example PrimaryKeyColumnName"
     * @bodyParam PrimaryKeyID string optional. Maximum length: 255. Example: "Example PrimaryKeyID"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam IsCreatedExported string optional. Example: "Example IsCreatedExported"
     * @bodyParam IsCreatedExportedOn string optional. Example: "Example IsCreatedExportedOn"
     * @bodyParam IsLastUpdatedExported string optional. date. Example: "Example IsLastUpdatedExported"
     * @bodyParam IsLastUpdatedExportedOn string optional. date. Example: "Example IsLastUpdatedExportedOn"
     * @bodyParam RowData string optional. Example: "Example RowData"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sync_data": {
     *                 "server_sync_primary_id": 1,
     *                 "clinic_id": 1,
     *                 "table_name": "Example Name",
     *                 "primary_key_column_name": "Example Name",
     *                 "primary_key_id": 1,
     *                 "row_guid": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "is_created_exported": true,
     *                 "is_created_exported_on": true,
     *                 "is_last_updated_exported": true,
     *                 "is_last_updated_exported_on": true,
     *                 "row_data": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ServerSyncDatumResource
     */
    public function update(UpdateServerSyncDatumRequest $request, ServerSyncDatum $serverSyncDatum)
    {
        try {
            $validatedData = $request->validated();

            $updatedSyncData = $this->serverSyncDatumService->updateServerSyncData($serverSyncDatum, $validatedData);

            return $this->successResponse([
                'message' => 'Server Sync Data updated successfully',
                'sync_data' => new ServerSyncDatumResource($updatedSyncData)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating Server Sync Data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update Server Sync Data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ServerSyncDatum
     *
     * @method DELETE
     *
     * Delete a serversyncdatum
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the serversyncdatum to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServerSyncDatum $serverSyncDatum)
    {
        //
    }
}
