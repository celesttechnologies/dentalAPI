<?php

namespace App\Http\Controllers;

use App\Models\ClinicTVRSSURLMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicTVRSSURLMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicTVRSSURLMasterResource;
use App\Http\Requests\StoreClinicTVRSSURLMasterRequest;
use App\Http\Requests\UpdateClinicTVRSSURLMasterRequest;

class ClinicTVRSSURLMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicTVRSSURLMasterService $clinicTVRSSURLMasterService)
    {
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method GET
     *
     * List all clinictvrssurlmaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_rss_urls": [
     *                 {
     *                     "id": 1,
     *                     "rss_title": "Example value",
     *                     "rss_description": "Example value",
     *                     "rss_url": "Example value",
     *                     "rss_xml": "Example value",
     *                     "is_user_configurable": true,
     *                     "is_online_feed": true,
     *                     "is_auto_sync": true,
     *                     "sync_frequency": "Example value",
     *                     "last_sync_time": "Example value",
     *                     "is_deleted": true,
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

            $data = $this->clinicTVRSSURLMasterService->getClinicTVRSSURLs($perPage);

            return $this->successResponse([
                'clinic_tv_rss_urls' => ClinicTVRSSURLMasterResource::collection($data['clinic_tv_rss_urls']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic TV RSS URLs: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method GET
     *
     * Create clinictvrssurlmaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_rss_url": {
     *                 "id": 1,
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_url": "Example value",
     *                 "rss_xml": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_online_feed": true,
     *                 "is_auto_sync": true,
     *                 "sync_frequency": "Example value",
     *                 "last_sync_time": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVRSSURLMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method POST
     *
     * Create a new clinictvrssurlmaster
     *
     * @post /
     *
     * @bodyParam RSSTitle string required. Example: "Example RSSTitle"
     * @bodyParam RSSDescription string required. Example: "Example RSSDescription"
     * @bodyParam RSSURL string required. Example: "Example RSSURL"
     * @bodyParam RSSXML string required. Example: "Example RSSXML"
     * @bodyParam IsUserConfigurable string required. Example: "Example IsUserConfigurable"
     * @bodyParam IsOnlineFeed string required. Example: "Example IsOnlineFeed"
     * @bodyParam IsAutoSync string required. Example: "Example IsAutoSync"
     * @bodyParam SyncFrequency string required. Example: "Example SyncFrequency"
     * @bodyParam LastSyncTime string required. Example: "Example LastSyncTime"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_rss_url": {
     *                 "id": 1,
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_url": "Example value",
     *                 "rss_xml": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_online_feed": true,
     *                 "is_auto_sync": true,
     *                 "sync_frequency": "Example value",
     *                 "last_sync_time": "Example value",
     *                 "is_deleted": true,
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
     * @return ClinicTVRSSURLMasterResource
     */
    public function store(StoreClinicTVRSSURLMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $rssUrl = $this->clinicTVRSSURLMasterService->createRSSURLMaster($validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV RSS URL created successfully',
                'clinic_tv_rss_url' => new ClinicTVRSSURLMasterResource($rssUrl)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic TV RSS URL: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic TV RSS URL',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method GET
     *
     * Get a specific clinictvrssurlmaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinictvrssurlmaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_rss_url": {
     *                 "id": 1,
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_url": "Example value",
     *                 "rss_xml": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_online_feed": true,
     *                 "is_auto_sync": true,
     *                 "sync_frequency": "Example value",
     *                 "last_sync_time": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVRSSURLMasterResource
     */
    public function show(ClinicTVRSSURLMaster $clinicTVRSSURLMaster)
    {
        //
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method GET
     *
     * Edit clinictvrssurlmaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinictvrssurlmaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_rss_url": {
     *                 "id": 1,
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_url": "Example value",
     *                 "rss_xml": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_online_feed": true,
     *                 "is_auto_sync": true,
     *                 "sync_frequency": "Example value",
     *                 "last_sync_time": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVRSSURLMasterResource
     */
    public function edit(ClinicTVRSSURLMaster $clinicTVRSSURLMaster)
    {
        //
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method PUT
     *
     * Update an existing clinictvrssurlmaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinictvrssurlmaster to update. Example: 1
     *
     * @bodyParam RSSTitle string optional. Example: "Example RSSTitle"
     * @bodyParam RSSDescription string optional. Example: "Example RSSDescription"
     * @bodyParam RSSURL string optional. Example: "Example RSSURL"
     * @bodyParam RSSXML string optional. Example: "Example RSSXML"
     * @bodyParam IsUserConfigurable string optional. Example: "Example IsUserConfigurable"
     * @bodyParam IsOnlineFeed string optional. Example: "Example IsOnlineFeed"
     * @bodyParam IsAutoSync string optional. Example: "Example IsAutoSync"
     * @bodyParam SyncFrequency string optional. Example: "Example SyncFrequency"
     * @bodyParam LastSyncTime string optional. Example: "Example LastSyncTime"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_rss_url": {
     *                 "id": 1,
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_url": "Example value",
     *                 "rss_xml": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_online_feed": true,
     *                 "is_auto_sync": true,
     *                 "sync_frequency": "Example value",
     *                 "last_sync_time": "Example value",
     *                 "is_deleted": true,
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
     * @return ClinicTVRSSURLMasterResource
     */
    public function update(UpdateClinicTVRSSURLMasterRequest $request, ClinicTVRSSURLMaster $clinicTVRSSURLMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedRSSURL = $this->clinicTVRSSURLMasterService->updateRSSURLMaster($clinicTVRSSURLMaster, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV RSS URL updated successfully',
                'clinic_tv_rss_url' => new ClinicTVRSSURLMasterResource($updatedRSSURL)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic TV RSS URL: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic TV RSS URL',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVRSSURLMaster
     *
     * @method DELETE
     *
     * Delete a clinictvrssurlmaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinictvrssurlmaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicTVRSSURLMaster $clinicTVRSSURLMaster)
    {
        //
    }
}
