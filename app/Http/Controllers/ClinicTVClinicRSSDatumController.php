<?php

namespace App\Http\Controllers;

use App\Models\ClinicTVClinicRSSDatum;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicTVClinicRSSDatumService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicTVClinicRSSDatumResource;
use App\Http\Requests\StoreClinicTVClinicRSSDatumRequest;
use App\Http\Requests\UpdateClinicTVClinicRSSDatumRequest;

class ClinicTVClinicRSSDatumController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicTVClinicRSSDatumService $clinicTVClinicRSSDatumService)
    {
    }

    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method GET
     *
     * List all clinictvclinicrssdatum
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_clinic_rss_data": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "news_ticker_rss_master_id": 1,
     *                     "rss_url": "Example value",
     *                     "rss_title": "Example value",
     *                     "rss_description": "Example value",
     *                     "rss_xml": "Example value",
     *                     "rss_text": "Example value",
     *                     "is_user_configurable": true,
     *                     "is_deleted": true,
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

            $data = $this->clinicTVClinicRSSDatumService->getClinicTVClinicRSSData($perPage);

            return $this->successResponse([
                'clinic_tv_clinic_rss_data' => ClinicTVClinicRSSDatumResource::collection($data['clinic_tv_clinic_rss_data']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic TV RSS data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method GET
     *
     * Create clinictvclinicrssdatum
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_clinic_rss_data": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "news_ticker_rss_master_id": 1,
     *                 "rss_url": "Example value",
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_xml": "Example value",
     *                 "rss_text": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_deleted": true,
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
     * @return ClinicTVClinicRSSDatumResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method POST
     *
     * Create a new clinictvclinicrssdatum
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam NewsTickerRSSMasterID string required. Maximum length: 255. Example: "Example NewsTickerRSSMasterID"
     * @bodyParam RSSURL string required. Example: "Example RSSURL"
     * @bodyParam RSSTitle string required. Example: "Example RSSTitle"
     * @bodyParam RSSDescription string required. Example: "Example RSSDescription"
     * @bodyParam RSSXML string required. Example: "Example RSSXML"
     * @bodyParam RSSText string required. Example: "Example RSSText"
     * @bodyParam IsUserConfigurable string required. Example: "Example IsUserConfigurable"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_clinic_rss_data": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "news_ticker_rss_master_id": 1,
     *                 "rss_url": "Example value",
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_xml": "Example value",
     *                 "rss_text": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_deleted": true,
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
     * @return ClinicTVClinicRSSDatumResource
     */
    public function store(StoreClinicTVClinicRSSDatumRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $rssData = $this->clinicTVClinicRSSDatumService->createClinicTVClinicRSSData($validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV RSS data created successfully',
                'clinic_tv_clinic_rss_data' => new ClinicTVClinicRSSDatumResource($rssData)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic TV RSS data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic TV RSS data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method GET
     *
     * Get a specific clinictvclinicrssdatum
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinictvclinicrssdatum to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_clinic_rss_data": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "news_ticker_rss_master_id": 1,
     *                 "rss_url": "Example value",
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_xml": "Example value",
     *                 "rss_text": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_deleted": true,
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
     * @return ClinicTVClinicRSSDatumResource
     */
    public function show(ClinicTVClinicRSSDatum $clinicTVClinicRSSDatum)
    {
        //
    }

    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method GET
     *
     * Edit clinictvclinicrssdatum
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinictvclinicrssdatum to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_clinic_rss_data": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "news_ticker_rss_master_id": 1,
     *                 "rss_url": "Example value",
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_xml": "Example value",
     *                 "rss_text": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_deleted": true,
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
     * @return ClinicTVClinicRSSDatumResource
     */
    public function edit(ClinicTVClinicRSSDatum $clinicTVClinicRSSDatum)
    {
        //
    }

    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method PUT
     *
     * Update an existing clinictvclinicrssdatum
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinictvclinicrssdatum to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam NewsTickerRSSMasterID string optional. Maximum length: 255. Example: "Example NewsTickerRSSMasterID"
     * @bodyParam RSSURL string optional. Example: "Example RSSURL"
     * @bodyParam RSSTitle string optional. Example: "Example RSSTitle"
     * @bodyParam RSSDescription string optional. Example: "Example RSSDescription"
     * @bodyParam RSSXML string optional. Example: "Example RSSXML"
     * @bodyParam RSSText string optional. Example: "Example RSSText"
     * @bodyParam IsUserConfigurable string optional. Example: "Example IsUserConfigurable"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_clinic_rss_data": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "news_ticker_rss_master_id": 1,
     *                 "rss_url": "Example value",
     *                 "rss_title": "Example value",
     *                 "rss_description": "Example value",
     *                 "rss_xml": "Example value",
     *                 "rss_text": "Example value",
     *                 "is_user_configurable": true,
     *                 "is_deleted": true,
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
     * @return ClinicTVClinicRSSDatumResource
     */
    public function update(UpdateClinicTVClinicRSSDatumRequest $request, ClinicTVClinicRSSDatum $clinicTVClinicRSSDatum)
    {
        try {
            $validatedData = $request->validated();

            $updatedRSSData = $this->clinicTVClinicRSSDatumService->updateClinicTVClinicRSSData($clinicTVClinicRSSDatum, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV RSS data updated successfully',
                'clinic_tv_clinic_rss_data' => new ClinicTVClinicRSSDatumResource($updatedRSSData)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic TV RSS data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic TV RSS data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVClinicRSSDatum
     *
     * @method DELETE
     *
     * Delete a clinictvclinicrssdatum
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinictvclinicrssdatum to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicTVClinicRSSDatum $clinicTVClinicRSSDatum)
    {
        //
    }
}
