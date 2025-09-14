<?php

namespace App\Http\Controllers;

use App\Models\ActivityInOutHeader;
use App\Services\ActivityInOutHeaderService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityInOutHeaderRequest;
use App\Http\Requests\UpdateActivityInOutHeaderRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ActivityInOutHeaderResource;

class ActivityInOutHeaderController extends Controller
{
    use ApiResponse;

    public function __construct(
        private ActivityInOutHeaderService $activityInOutHeaderService
    ) {
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method GET
     *
     * List all activityinoutheader
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_headers": [
     *                 {
     *                     "id": 1,
     *                     "activity_type": "Example value",
     *                     "activity_date": "Example value",
     *                     "employee_id": 1,
     *                     "location_id": 1,
     *                     "remarks": "Example value",
     *                     "created_at": "2025-05-19 04:57:26",
     *                     "updated_at": "2025-05-19 04:57:26",
     *                     "details": "Example value"
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

            $data = $this->activityInOutHeaderService->getActivityInOutHeaders($perPage);

            return $this->successResponse([
                'activity_in_out_headers' => ActivityInOutHeaderResource::collection($data['activity_in_out_headers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching activity in/out headers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method GET
     *
     * Create activityinoutheader
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_header": {
     *                 "id": 1,
     *                 "activity_type": "Example value",
     *                 "activity_date": "Example value",
     *                 "employee_id": 1,
     *                 "location_id": 1,
     *                 "remarks": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutHeaderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method POST
     *
     * Create a new activityinoutheader
     *
     * @post /
     *
     * @bodyParam HeaderID string required. Maximum length: 255. Example: "Example HeaderID"
     * @bodyParam UserID string required. Maximum length: 255. Example: "Example UserID"
     * @bodyParam ActivityDate string required. date. Example: "Example ActivityDate"
     * @bodyParam Remarks string optional. nullable. Example: "Example Remarks"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_header": {
     *                 "id": 1,
     *                 "activity_type": "Example value",
     *                 "activity_date": "Example value",
     *                 "employee_id": 1,
     *                 "location_id": 1,
     *                 "remarks": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutHeaderResource
     */
    public function store(StoreActivityInOutHeaderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $activityInOutHeader = $this->activityInOutHeaderService->createActivityInOutHeader($validatedData);

            return $this->successResponse([
                'message' => 'Activity in/out header created successfully',
                'activity_in_out_header' => new ActivityInOutHeaderResource($activityInOutHeader)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating activity in/out header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create activity in/out header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method GET
     *
     * Get a specific activityinoutheader
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the activityinoutheader to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_header": {
     *                 "id": 1,
     *                 "activity_type": "Example value",
     *                 "activity_date": "Example value",
     *                 "employee_id": 1,
     *                 "location_id": 1,
     *                 "remarks": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutHeaderResource
     */
    public function show(ActivityInOutHeader $activityInOutHeader)
    {
        //
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method GET
     *
     * Edit activityinoutheader
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the activityinoutheader to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_header": {
     *                 "id": 1,
     *                 "activity_type": "Example value",
     *                 "activity_date": "Example value",
     *                 "employee_id": 1,
     *                 "location_id": 1,
     *                 "remarks": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutHeaderResource
     */
    public function edit(ActivityInOutHeader $activityInOutHeader)
    {
        //
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method PUT
     *
     * Update an existing activityinoutheader
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the activityinoutheader to update. Example: 1
     *
     * @bodyParam HeaderID string optional. Maximum length: 255. Example: "Example HeaderID"
     * @bodyParam UserID string optional. Maximum length: 255. Example: "Example UserID"
     * @bodyParam ActivityDate string optional. date. Example: "Example ActivityDate"
     * @bodyParam Remarks string optional. nullable. Example: "Example Remarks"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_header": {
     *                 "id": 1,
     *                 "activity_type": "Example value",
     *                 "activity_date": "Example value",
     *                 "employee_id": 1,
     *                 "location_id": 1,
     *                 "remarks": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutHeaderResource
     */
    public function update(UpdateActivityInOutHeaderRequest $request, ActivityInOutHeader $activityInOutHeader)
    {
        try {
            $validatedData = $request->validated();

            $updatedActivityInOutHeader = $this->activityInOutHeaderService->updateActivityInOutHeader($activityInOutHeader, $validatedData);

            return $this->successResponse([
                'message' => 'Activity in/out header updated successfully',
                'activity_in_out_header' => new ActivityInOutHeaderResource($updatedActivityInOutHeader)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating activity in/out header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update activity in/out header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ActivityInOutHeader
     *
     * @method DELETE
     *
     * Delete a activityinoutheader
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the activityinoutheader to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityInOutHeader $activityInOutHeader)
    {
        //
    }
}
