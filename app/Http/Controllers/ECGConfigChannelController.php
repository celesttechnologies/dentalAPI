<?php

namespace App\Http\Controllers;

use App\Models\ECGConfigChannel;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGConfigChannelService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGConfigChannelResource;
use App\Http\Requests\StoreECGConfigChannelRequest;
use App\Http\Requests\UpdateECGConfigChannelRequest;

class ECGConfigChannelController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGConfigChannelService $configChannelService)
    {
    }

    /**
     * @group ECGConfigChannel
     *
     * @method GET
     *
     * List all ecgconfigchannel
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "config_channels": [
     *                 {
     *                     "ecg_channel_id": 1,
     *                     "clinic_id_csv": 1,
     *                     "channel_name": "Example Name",
     *                     "channel_description": "Example value",
     *                     "channel_type_id": 1,
     *                     "publish_from": "Example value",
     *                     "publish_to": "Example value",
     *                     "is_active": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
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

            $data = $this->configChannelService->getConfigChannels($perPage);

            return $this->successResponse([
                'config_channels' => ECGConfigChannelResource::collection($data['config_channels']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG config channels: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGConfigChannel
     *
     * @method GET
     *
     * Create ecgconfigchannel
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "config_channel": {
     *                 "ecg_channel_id": 1,
     *                 "clinic_id_csv": 1,
     *                 "channel_name": "Example Name",
     *                 "channel_description": "Example value",
     *                 "channel_type_id": 1,
     *                 "publish_from": "Example value",
     *                 "publish_to": "Example value",
     *                 "is_active": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGConfigChannelResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGConfigChannel
     *
     * @method POST
     *
     * Create a new ecgconfigchannel
     *
     * @post /
     *
     * @bodyParam ClinicIDCSV string required. Maximum length: 255. Example: "Example ClinicIDCSV"
     * @bodyParam ChannelName string required. Example: "Example ChannelName"
     * @bodyParam ChannelDescription string required. Example: "Example ChannelDescription"
     * @bodyParam ChannelTypeID string required. Maximum length: 255. Example: "Example ChannelTypeID"
     * @bodyParam PublishFrom string required. Example: "Example PublishFrom"
     * @bodyParam PublishTo string required. Example: "Example PublishTo"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "config_channel": {
     *                 "ecg_channel_id": 1,
     *                 "clinic_id_csv": 1,
     *                 "channel_name": "Example Name",
     *                 "channel_description": "Example value",
     *                 "channel_type_id": 1,
     *                 "publish_from": "Example value",
     *                 "publish_to": "Example value",
     *                 "is_active": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
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
     * @return ECGConfigChannelResource
     */
    public function store(StoreECGConfigChannelRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $configChannel = $this->configChannelService->createConfigChannel($validatedData);

            return $this->successResponse([
                'message' => 'Config channel created successfully',
                'config_channel' => new ECGConfigChannelResource($configChannel)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating config channel: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create config channel',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGConfigChannel
     *
     * @method GET
     *
     * Get a specific ecgconfigchannel
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgconfigchannel to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "config_channel": {
     *                 "ecg_channel_id": 1,
     *                 "clinic_id_csv": 1,
     *                 "channel_name": "Example Name",
     *                 "channel_description": "Example value",
     *                 "channel_type_id": 1,
     *                 "publish_from": "Example value",
     *                 "publish_to": "Example value",
     *                 "is_active": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGConfigChannelResource
     */
    public function show(ECGConfigChannel $eCGConfigChannel)
    {
        //
    }

    /**
     * @group ECGConfigChannel
     *
     * @method GET
     *
     * Edit ecgconfigchannel
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgconfigchannel to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "config_channel": {
     *                 "ecg_channel_id": 1,
     *                 "clinic_id_csv": 1,
     *                 "channel_name": "Example Name",
     *                 "channel_description": "Example value",
     *                 "channel_type_id": 1,
     *                 "publish_from": "Example value",
     *                 "publish_to": "Example value",
     *                 "is_active": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGConfigChannelResource
     */
    public function edit(ECGConfigChannel $eCGConfigChannel)
    {
        //
    }

    /**
     * @group ECGConfigChannel
     *
     * @method PUT
     *
     * Update an existing ecgconfigchannel
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgconfigchannel to update. Example: 1
     *
     * @bodyParam ClinicIDCSV string optional. Maximum length: 255. Example: "Example ClinicIDCSV"
     * @bodyParam ChannelName string optional. Example: "Example ChannelName"
     * @bodyParam ChannelDescription string optional. Example: "Example ChannelDescription"
     * @bodyParam ChannelTypeID string optional. Maximum length: 255. Example: "Example ChannelTypeID"
     * @bodyParam PublishFrom string optional. Example: "Example PublishFrom"
     * @bodyParam PublishTo string optional. Example: "Example PublishTo"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "config_channel": {
     *                 "ecg_channel_id": 1,
     *                 "clinic_id_csv": 1,
     *                 "channel_name": "Example Name",
     *                 "channel_description": "Example value",
     *                 "channel_type_id": 1,
     *                 "publish_from": "Example value",
     *                 "publish_to": "Example value",
     *                 "is_active": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
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
     * @return ECGConfigChannelResource
     */
    public function update(UpdateECGConfigChannelRequest $request, ECGConfigChannel $eCGConfigChannel)
    {
        try {
            $validatedData = $request->validated();

            $updatedChannel = $this->configChannelService->updateConfigChannel($eCGConfigChannel, $validatedData);

            return $this->successResponse([
                'message' => 'Config channel updated successfully',
                'config_channel' => new ECGConfigChannelResource($updatedChannel)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating config channel: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update config channel',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGConfigChannel
     *
     * @method DELETE
     *
     * Delete a ecgconfigchannel
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgconfigchannel to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGConfigChannel $eCGConfigChannel)
    {
        //
    }
}
