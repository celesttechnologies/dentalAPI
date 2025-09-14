<?php

namespace App\Http\Controllers;

use App\Models\DWSConfigClinicTiming;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DWSConfigClinicTimingService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DWSConfigClinicTimingResource;
use App\Http\Requests\StoreDWSConfigClinicTimingRequest;
use App\Http\Requests\UpdateDWSConfigClinicTimingRequest;

class DWSConfigClinicTimingController extends Controller
{
    use ApiResponse;

    public function __construct(private DWSConfigClinicTimingService $clinicTimingService)
    {
    }

    /**
     * @group DWSConfigClinicTiming
     *
     * @method GET
     *
     * List all dwsconfigclinictiming
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_timings": [
     *                 {
     *                     "clinic_timing_id": 1,
     *                     "clinic_website_id": 1,
     *                     "day_id": 1,
     *                     "day_of_week": "Example value",
     *                     "timings_text": "Example value",
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

            $data = $this->clinicTimingService->getClinicTimings($perPage);

            return $this->successResponse([
                'clinic_timings' => DWSConfigClinicTimingResource::collection($data['clinic_timings']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic timings: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group DWSConfigClinicTiming
     *
     * @method GET
     *
     * Create dwsconfigclinictiming
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_timing": {
     *                 "clinic_timing_id": 1,
     *                 "clinic_website_id": 1,
     *                 "day_id": 1,
     *                 "day_of_week": "Example value",
     *                 "timings_text": "Example value",
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
     * @return DWSConfigClinicTimingResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DWSConfigClinicTiming
     *
     * @method POST
     *
     * Create a new dwsconfigclinictiming
     *
     * @post /
     *
     * @bodyParam ClinicWebSiteID string required. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam DayID string required. Maximum length: 255. Example: "Example DayID"
     * @bodyParam DayofWeek string required. Example: "Example DayofWeek"
     * @bodyParam TimingsText string required. Example: "Example TimingsText"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_timing": {
     *                 "clinic_timing_id": 1,
     *                 "clinic_website_id": 1,
     *                 "day_id": 1,
     *                 "day_of_week": "Example value",
     *                 "timings_text": "Example value",
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
     * @return DWSConfigClinicTimingResource
     */
    public function store(StoreDWSConfigClinicTimingRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $clinicTiming = $this->clinicTimingService->createClinicTiming($validatedData);

            return $this->successResponse([
                'message' => 'Clinic timing created successfully',
                'clinic_timing' => new DWSConfigClinicTimingResource($clinicTiming)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic timing: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic timing',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigClinicTiming
     *
     * @method GET
     *
     * Get a specific dwsconfigclinictiming
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigclinictiming to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_timing": {
     *                 "clinic_timing_id": 1,
     *                 "clinic_website_id": 1,
     *                 "day_id": 1,
     *                 "day_of_week": "Example value",
     *                 "timings_text": "Example value",
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
     * @return DWSConfigClinicTimingResource
     */
    public function show(DWSConfigClinicTiming $dWSConfigClinicTiming)
    {
        //
    }

    /**
     * @group DWSConfigClinicTiming
     *
     * @method GET
     *
     * Edit dwsconfigclinictiming
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the dwsconfigclinictiming to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_timing": {
     *                 "clinic_timing_id": 1,
     *                 "clinic_website_id": 1,
     *                 "day_id": 1,
     *                 "day_of_week": "Example value",
     *                 "timings_text": "Example value",
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
     * @return DWSConfigClinicTimingResource
     */
    public function edit(DWSConfigClinicTiming $dWSConfigClinicTiming)
    {
        //
    }

    /**
     * @group DWSConfigClinicTiming
     *
     * @method PUT
     *
     * Update an existing dwsconfigclinictiming
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigclinictiming to update. Example: 1
     *
     * @bodyParam ClinicWebSiteID string optional. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam DayID string optional. Maximum length: 255. Example: "Example DayID"
     * @bodyParam DayofWeek string optional. Example: "Example DayofWeek"
     * @bodyParam TimingsText string optional. Example: "Example TimingsText"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_timing": {
     *                 "clinic_timing_id": 1,
     *                 "clinic_website_id": 1,
     *                 "day_id": 1,
     *                 "day_of_week": "Example value",
     *                 "timings_text": "Example value",
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
     * @return DWSConfigClinicTimingResource
     */
    public function update(UpdateDWSConfigClinicTimingRequest $request, DWSConfigClinicTiming $dWSConfigClinicTiming)
    {
        try {
            $validatedData = $request->validated();

            $updatedClinicTiming = $this->clinicTimingService->updateClinicTiming($dWSConfigClinicTiming, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic timing updated successfully',
                'clinic_timing' => new DWSConfigClinicTimingResource($updatedClinicTiming)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic timing: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic timing',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigClinicTiming
     *
     * @method DELETE
     *
     * Delete a dwsconfigclinictiming
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigclinictiming to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DWSConfigClinicTiming $dWSConfigClinicTiming)
    {
        //
    }
}
