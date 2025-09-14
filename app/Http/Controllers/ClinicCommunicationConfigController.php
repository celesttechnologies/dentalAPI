<?php

namespace App\Http\Controllers;

use App\Models\ClinicCommunicationConfig;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicCommunicationConfigService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicCommunicationConfigResource;
use App\Http\Requests\StoreClinicCommunicationConfigRequest;
use App\Http\Requests\UpdateClinicCommunicationConfigRequest;

class ClinicCommunicationConfigController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicCommunicationConfigService $clinicCommunicationConfigService)
    {
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method GET
     *
     * List all cliniccommunicationconfig
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_configs": [
     *                 {
     *                     "clinic_communication_config_id": 1,
     *                     "clinic_id": 1,
     *                     "clinic_communication_master_id": 1,
     *                     "attribute_value_1": "Example value",
     *                     "attribute_value_2": "Example value",
     *                     "is_active": true,
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->clinicCommunicationConfigService->getClinicCommunicationConfigs($perPage);

            return $this->successResponse([
                'clinic_communication_configs' => ClinicCommunicationConfigResource::collection($data['clinic_communication_configs']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic communication configs: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method GET
     *
     * Create cliniccommunicationconfig
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_config": {
     *                 "clinic_communication_config_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_communication_master_id": 1,
     *                 "attribute_value_1": "Example value",
     *                 "attribute_value_2": "Example value",
     *                 "is_active": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationConfigResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method POST
     *
     * Create a new cliniccommunicationconfig
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ClinicCommunicationMasterID string required. Maximum length: 255. Example: "Example ClinicCommunicationMasterID"
     * @bodyParam AttributeValue1 string required. Example: "Example AttributeValue1"
     * @bodyParam AttributeValue2 string required. Example: "Example AttributeValue2"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_config": {
     *                 "clinic_communication_config_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_communication_master_id": 1,
     *                 "attribute_value_1": "Example value",
     *                 "attribute_value_2": "Example value",
     *                 "is_active": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationConfigResource
     */
    public function store(StoreClinicCommunicationConfigRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $config = $this->clinicCommunicationConfigService->createClinicCommunicationConfig($validatedData);

            return $this->successResponse([
                'message' => 'Clinic communication config created successfully',
                'clinic_communication_config' => new ClinicCommunicationConfigResource($config)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic communication config: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic communication config',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method GET
     *
     * Get a specific cliniccommunicationconfig
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cliniccommunicationconfig to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_config": {
     *                 "clinic_communication_config_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_communication_master_id": 1,
     *                 "attribute_value_1": "Example value",
     *                 "attribute_value_2": "Example value",
     *                 "is_active": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationConfigResource
     */
    public function show(ClinicCommunicationConfig $clinicCommunicationConfig)
    {
        //
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method GET
     *
     * Edit cliniccommunicationconfig
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cliniccommunicationconfig to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_config": {
     *                 "clinic_communication_config_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_communication_master_id": 1,
     *                 "attribute_value_1": "Example value",
     *                 "attribute_value_2": "Example value",
     *                 "is_active": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationConfigResource
     */
    public function edit(ClinicCommunicationConfig $clinicCommunicationConfig)
    {
        //
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method PUT
     *
     * Update an existing cliniccommunicationconfig
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cliniccommunicationconfig to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ClinicCommunicationMasterID string optional. Maximum length: 255. Example: "Example ClinicCommunicationMasterID"
     * @bodyParam AttributeValue1 string optional. Example: "Example AttributeValue1"
     * @bodyParam AttributeValue2 string optional. Example: "Example AttributeValue2"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_config": {
     *                 "clinic_communication_config_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_communication_master_id": 1,
     *                 "attribute_value_1": "Example value",
     *                 "attribute_value_2": "Example value",
     *                 "is_active": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationConfigResource
     */
    public function update(UpdateClinicCommunicationConfigRequest $request, ClinicCommunicationConfig $clinicCommunicationConfig)
    {
        try {
            $validatedData = $request->validated();

            $updatedConfig = $this->clinicCommunicationConfigService->updateClinicCommunicationConfig($clinicCommunicationConfig, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic communication config updated successfully',
                'clinic_communication_config' => new ClinicCommunicationConfigResource($updatedConfig)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic communication config: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic communication config',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicCommunicationConfig
     *
     * @method DELETE
     *
     * Delete a cliniccommunicationconfig
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cliniccommunicationconfig to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicCommunicationConfig $clinicCommunicationConfig)
    {
        //
    }
}
