<?php

namespace App\Http\Controllers;

use App\Models\ChairSlot; // Ensure this is the correct model
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ChairSlotService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ChairSlotResource;
use App\Http\Requests\StoreChairSlotRequest;
use App\Http\Requests\UpdateChairSlotRequest;

class ChairSlotController extends Controller
{
    use ApiResponse;

    public function __construct(private ChairSlotService $chairSlotService)
    {
    }

    /**
     * @group ChairSlot
     *
     * @method GET
     *
     * List all chairslot
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "chairSlots": [
     *                 {
     *                     "chair_slot_id": 1,
     *                     "chair_id": 1,
     *                     "start_datetime": "Example value",
     *                     "end_datetime": "Example value",
     *                     "slot_interval": "Example value",
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

            $chairSlots = $this->chairSlotService->getChairSlots($perPage);

            return $this->successResponse([
                'chairSlots' => ChairSlotResource::collection($chairSlots['chairSlots']),
                'pagination' => $chairSlots['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching chair slots: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ChairSlot
     *
     * @method GET
     *
     * Create chairslot
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "chair_slot": {
     *                 "chair_slot_id": 1,
     *                 "chair_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
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
     * @return ChairSlotResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ChairSlot
     *
     * @method POST
     *
     * Create a new chairslot
     *
     * @post /
     *
     * @bodyParam ChairSlotID string required. Maximum length: 255. Example: "Example ChairSlotID"
     * @bodyParam ChairID string required. Maximum length: 255. Example: "Example ChairID"
     * @bodyParam StartDatetime string required. date. Example: "Example StartDatetime"
     * @bodyParam EndDateTime string required. date. Example: "Example EndDateTime"
     * @bodyParam SlotInterval number required. integer. Example: 1
     * @bodyParam CreatedOn string required. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "chair_slot": {
     *                 "chair_slot_id": 1,
     *                 "chair_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
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
     * @return ChairSlotResource
     */
    public function store(StoreChairSlotRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $chairSlot = $this->chairSlotService->createChairSlot($validatedData);

            return $this->successResponse([
                'message' => 'Chair slot created successfully',
                'chair_slot' => new ChairSlotResource($chairSlot)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating chair slot: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create chair slot',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ChairSlot
     *
     * @method GET
     *
     * Get a specific chairslot
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the chairslot to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "chair_slot": {
     *                 "chair_slot_id": 1,
     *                 "chair_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
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
     * @return ChairSlotResource
     */
    public function show(ChairSlot $chairSlot)
    {
        //
    }

    /**
     * @group ChairSlot
     *
     * @method GET
     *
     * Edit chairslot
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the chairslot to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "chair_slot": {
     *                 "chair_slot_id": 1,
     *                 "chair_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
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
     * @return ChairSlotResource
     */
    public function edit(ChairSlot $chairSlot)
    {
        //
    }

    /**
     * @group ChairSlot
     *
     * @method PUT
     *
     * Update an existing chairslot
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the chairslot to update. Example: 1
     *
     * @bodyParam ChairSlotID string optional. Maximum length: 255. Example: "Example ChairSlotID"
     * @bodyParam ChairID string optional. Maximum length: 255. Example: "Example ChairID"
     * @bodyParam StartDatetime string optional. date. Example: "Example StartDatetime"
     * @bodyParam EndDateTime string optional. date. Example: "Example EndDateTime"
     * @bodyParam SlotInterval number optional. integer. Example: 1
     * @bodyParam CreatedOn string optional. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "chair_slot": {
     *                 "chair_slot_id": 1,
     *                 "chair_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
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
     * @return ChairSlotResource
     */
    public function update(UpdateChairSlotRequest $request, ChairSlot $chairSlot)
    {
        try {
            $validatedData = $request->validated();

            $updatedChairSlot = $this->chairSlotService->updateChairSlot($chairSlot, $validatedData);

            return $this->successResponse([
                'message' => 'Chair slot updated successfully',
                'chair_slot' => new ChairSlotResource($updatedChairSlot)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating chair slot: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update chair slot',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ChairSlot
     *
     * @method DELETE
     *
     * Delete a chairslot
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the chairslot to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChairSlot $chairSlot)
    {
        //
    }
}
