<?php

namespace App\Http\Controllers;

use App\Models\ActivityInOutDetail;
use App\Services\ActivityInOutDetailService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityInOutDetailRequest;
use App\Http\Requests\UpdateActivityInOutDetailRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ActivityInOutDetailResource;

class ActivityInOutDetailController extends Controller
{
    use ApiResponse;

    public function __construct(
        private ActivityInOutDetailService $activityInOutDetailService
    ) {
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method GET
     *
     * List all activityinoutdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_details": [
     *                 {
     *                     "id": 1,
     *                     "activity_in_out_header_id": 1,
     *                     "item_id": 1,
     *                     "quantity": "Example value",
     *                     "remarks": "Example value"
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

            $data = $this->activityInOutDetailService->getActivityInOutDetails($perPage);

            return $this->successResponse([
                'activity_in_out_details' => ActivityInOutDetailResource::collection($data['activity_in_out_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching activity in/out details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method GET
     *
     * Create activityinoutdetail
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_detail": {
     *                 "id": 1,
     *                 "activity_in_out_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "remarks": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutDetailResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method POST
     *
     * Create a new activityinoutdetail
     *
     * @post /
     *
     * @bodyParam DetailID string required. Maximum length: 255. Example: "Example DetailID"
     * @bodyParam ActivityHeaderID string required. Maximum length: 255. Example: "Example ActivityHeaderID"
     * @bodyParam Status string required. Maximum length: 100. Example: "Example Status"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_detail": {
     *                 "id": 1,
     *                 "activity_in_out_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "remarks": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutDetailResource
     */
    public function store(StoreActivityInOutDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $activityInOutDetail = $this->activityInOutDetailService->createActivityInOutDetail($validatedData);

            return $this->successResponse([
                'message' => 'Activity in/out detail created successfully',
                'activity_in_out_detail' => new ActivityInOutDetailResource($activityInOutDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating activity in/out detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create activity in/out detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method GET
     *
     * Get a specific activityinoutdetail
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the activityinoutdetail to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_detail": {
     *                 "id": 1,
     *                 "activity_in_out_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "remarks": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutDetailResource
     */
    public function show(ActivityInOutDetail $activityInOutDetail)
    {
        //
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method GET
     *
     * Edit activityinoutdetail
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the activityinoutdetail to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_detail": {
     *                 "id": 1,
     *                 "activity_in_out_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "remarks": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutDetailResource
     */
    public function edit(ActivityInOutDetail $activityInOutDetail)
    {
        //
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method PUT
     *
     * Update an existing activityinoutdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the activityinoutdetail to update. Example: 1
     *
     * @bodyParam DetailID string optional. Maximum length: 255. Example: "Example DetailID"
     * @bodyParam ActivityHeaderID string optional. Maximum length: 255. Example: "Example ActivityHeaderID"
     * @bodyParam Status string optional. Maximum length: 100. Example: "Example Status"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "activity_in_out_detail": {
     *                 "id": 1,
     *                 "activity_in_out_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "remarks": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ActivityInOutDetailResource
     */
    public function update(UpdateActivityInOutDetailRequest $request, ActivityInOutDetail $activityInOutDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedActivityInOutDetail = $this->activityInOutDetailService->updateActivityInOutDetail($activityInOutDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Activity in/out detail updated successfully',
                'activity_in_out_detail' => new ActivityInOutDetailResource($updatedActivityInOutDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating activity in/out detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update activity in/out detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ActivityInOutDetail
     *
     * @method DELETE
     *
     * Delete a activityinoutdetail
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the activityinoutdetail to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityInOutDetail $activityInOutDetail)
    {
        //
    }
}
