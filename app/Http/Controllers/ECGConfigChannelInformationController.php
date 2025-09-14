<?php

namespace App\Http\Controllers;

use App\Models\ECGConfigChannelInformation;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGConfigChannelInformationService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGConfigChannelInformationResource;
use App\Http\Requests\StoreECGConfigChannelInformationRequest;
use App\Http\Requests\UpdateECGConfigChannelInformationRequest;

class ECGConfigChannelInformationController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGConfigChannelInformationService $channelInfoService)
    {
    }

    /**
     * @group ECGConfigChannelInformation
     *
     * @method GET
     *
     * List all ecgconfigchannelinformation
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "channel_information": [
     *                 {
     *                     "channel_information_id": 1,
     *                     "ecg_channel_id": 1,
     *                     "information_title": "Example value",
     *                     "title_link": "Example value",
     *                     "title_link_tag": "Example value",
     *                     "description": "Example value",
     *                     "other_link": "Example value",
     *                     "other_link_tag": "Example value",
     *                     "publish_till": "Example value",
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

            $data = $this->channelInfoService->getChannelInformation($perPage);

            return $this->successResponse([
                'channel_information' => ECGConfigChannelInformationResource::collection($data['channel_information']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG config channel information: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ECGConfigChannelInformation
     *
     * @method GET
     *
     * Create ecgconfigchannelinformation
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "channel_information": {
     *                 "channel_information_id": 1,
     *                 "ecg_channel_id": 1,
     *                 "information_title": "Example value",
     *                 "title_link": "Example value",
     *                 "title_link_tag": "Example value",
     *                 "description": "Example value",
     *                 "other_link": "Example value",
     *                 "other_link_tag": "Example value",
     *                 "publish_till": "Example value",
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
     * @return ECGConfigChannelInformationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGConfigChannelInformation
     *
     * @method POST
     *
     * Create a new ecgconfigchannelinformation
     *
     * @post /
     *
     * @bodyParam ECGChannelID string required. Maximum length: 255. Example: "Example ECGChannelID"
     * @bodyParam InformationTitle string required. Example: "Example InformationTitle"
     * @bodyParam TitleLink string required. Example: "Example TitleLink"
     * @bodyParam TitleLinkTag string required. Example: "Example TitleLinkTag"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam OtherLink string required. Example: "Example OtherLink"
     * @bodyParam OtherLinkTag string required. Example: "Example OtherLinkTag"
     * @bodyParam PublishTill string required. Example: "Example PublishTill"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "channel_information": {
     *                 "channel_information_id": 1,
     *                 "ecg_channel_id": 1,
     *                 "information_title": "Example value",
     *                 "title_link": "Example value",
     *                 "title_link_tag": "Example value",
     *                 "description": "Example value",
     *                 "other_link": "Example value",
     *                 "other_link_tag": "Example value",
     *                 "publish_till": "Example value",
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
     * @return ECGConfigChannelInformationResource
     */
    public function store(StoreECGConfigChannelInformationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $channelInfo = $this->channelInfoService->createChannelInformation($validatedData);

            return $this->successResponse([
                'message' => 'Channel information created successfully',
                'channel_information' => new ECGConfigChannelInformationResource($channelInfo)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating channel information: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create channel information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGConfigChannelInformation
     *
     * @method GET
     *
     * Get a specific ecgconfigchannelinformation
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgconfigchannelinformation to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "channel_information": {
     *                 "channel_information_id": 1,
     *                 "ecg_channel_id": 1,
     *                 "information_title": "Example value",
     *                 "title_link": "Example value",
     *                 "title_link_tag": "Example value",
     *                 "description": "Example value",
     *                 "other_link": "Example value",
     *                 "other_link_tag": "Example value",
     *                 "publish_till": "Example value",
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
     * @return ECGConfigChannelInformationResource
     */
    public function show(ECGConfigChannelInformation $eCGConfigChannelInformation)
    {
        //
    }

    /**
     * @group ECGConfigChannelInformation
     *
     * @method GET
     *
     * Edit ecgconfigchannelinformation
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgconfigchannelinformation to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "channel_information": {
     *                 "channel_information_id": 1,
     *                 "ecg_channel_id": 1,
     *                 "information_title": "Example value",
     *                 "title_link": "Example value",
     *                 "title_link_tag": "Example value",
     *                 "description": "Example value",
     *                 "other_link": "Example value",
     *                 "other_link_tag": "Example value",
     *                 "publish_till": "Example value",
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
     * @return ECGConfigChannelInformationResource
     */
    public function edit(ECGConfigChannelInformation $eCGConfigChannelInformation)
    {
        //
    }

    /**
     * @group ECGConfigChannelInformation
     *
     * @method PUT
     *
     * Update an existing ecgconfigchannelinformation
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgconfigchannelinformation to update. Example: 1
     *
     * @bodyParam ECGChannelID string optional. Maximum length: 255. Example: "Example ECGChannelID"
     * @bodyParam InformationTitle string optional. Example: "Example InformationTitle"
     * @bodyParam TitleLink string optional. Example: "Example TitleLink"
     * @bodyParam TitleLinkTag string optional. Example: "Example TitleLinkTag"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam OtherLink string optional. Example: "Example OtherLink"
     * @bodyParam OtherLinkTag string optional. Example: "Example OtherLinkTag"
     * @bodyParam PublishTill string optional. Example: "Example PublishTill"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "channel_information": {
     *                 "channel_information_id": 1,
     *                 "ecg_channel_id": 1,
     *                 "information_title": "Example value",
     *                 "title_link": "Example value",
     *                 "title_link_tag": "Example value",
     *                 "description": "Example value",
     *                 "other_link": "Example value",
     *                 "other_link_tag": "Example value",
     *                 "publish_till": "Example value",
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
     * @return ECGConfigChannelInformationResource
     */
    public function update(UpdateECGConfigChannelInformationRequest $request, ECGConfigChannelInformation $eCGConfigChannelInformation)
    {
        try {
            $validatedData = $request->validated();

            $updatedChannelInfo = $this->channelInfoService->updateChannelInformation($eCGConfigChannelInformation, $validatedData);

            return $this->successResponse([
                'message' => 'Channel information updated successfully',
                'channel_information' => new ECGConfigChannelInformationResource($updatedChannelInfo)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating channel information: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update channel information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGConfigChannelInformation
     *
     * @method DELETE
     *
     * Delete a ecgconfigchannelinformation
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgconfigchannelinformation to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGConfigChannelInformation $eCGConfigChannelInformation)
    {
        //
    }
}
