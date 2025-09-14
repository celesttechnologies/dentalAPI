<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProviderSlotResource; // Assuming you have a resource for Provider Slot
use App\Models\ProviderSlot;
use App\Services\ProviderSlotService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreProviderSlotRequest;
use App\Http\Requests\UpdateProviderSlotRequest;

class ProviderSlotController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private ProviderSlotService $slotService)
    {
    }

    /**
     * @group ProviderSlot
     *
     * @method GET
     *
     * List all providerslot
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider_slots": [
     *                 {
     *                     "provider_slot_id": 1,
     *                     "provider_id": 1,
     *                     "start_datetime": "Example value",
     *                     "end_datetime": "Example value",
     *                     "slot_interval": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "row_guid": 1,
     *                     "is_deleted": true
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
            $data = $this->slotService->getProviderSlots($perPage);

            return $this->successResponse([
                'provider_slots' => ProviderSlotResource::collection($data['provider_slots']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Provider Slots: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group ProviderSlot
     *
     * @method GET
     *
     * Create providerslot
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "slot": {
     *                 "provider_slot_id": 1,
     *                 "provider_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderSlotResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ProviderSlot
     *
     * @method POST
     *
     * Create a new providerslot
     *
     * @post /
     *
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam StartDatetime string required. date. Example: "Example StartDatetime"
     * @bodyParam EndDateTime string required. date. Example: "Example EndDateTime"
     * @bodyParam SlotInterval string required. Example: "Example SlotInterval"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "slot": {
     *                 "provider_slot_id": 1,
     *                 "provider_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderSlotResource
     */
    public function store(StoreProviderSlotRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $slot = $this->slotService->createProviderSlot($validatedData);

            return $this->successResponse([
                'message' => 'Provider slot created successfully',
                'slot' => new ProviderSlotResource($slot)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating provider slot: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create provider slot',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ProviderSlot
     *
     * @method GET
     *
     * Get a specific providerslot
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the providerslot to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "slot": {
     *                 "provider_slot_id": 1,
     *                 "provider_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderSlotResource
     */
    public function show(ProviderSlot $providerSlot)
    {
        //
    }

    /**
     * @group ProviderSlot
     *
     * @method GET
     *
     * Edit providerslot
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the providerslot to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "slot": {
     *                 "provider_slot_id": 1,
     *                 "provider_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderSlotResource
     */
    public function edit(ProviderSlot $providerSlot)
    {
        //
    }

    /**
     * @group ProviderSlot
     *
     * @method PUT
     *
     * Update an existing providerslot
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the providerslot to update. Example: 1
     *
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam StartDatetime string optional. date. Example: "Example StartDatetime"
     * @bodyParam EndDateTime string optional. date. Example: "Example EndDateTime"
     * @bodyParam SlotInterval string optional. Example: "Example SlotInterval"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "slot": {
     *                 "provider_slot_id": 1,
     *                 "provider_id": 1,
     *                 "start_datetime": "Example value",
     *                 "end_datetime": "Example value",
     *                 "slot_interval": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderSlotResource
     */
    public function update(UpdateProviderSlotRequest $request, ProviderSlot $providerSlot)
    {
        try {
            $validatedData = $request->validated();

            $updatedSlot = $this->slotService->updateProviderSlot($providerSlot, $validatedData);

            return $this->successResponse([
                'message' => 'Provider slot updated successfully',
                'slot' => new ProviderSlotResource($updatedSlot)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating provider slot: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update provider slot',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ProviderSlot
     *
     * @method DELETE
     *
     * Delete a providerslot
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the providerslot to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderSlot $providerSlot)
    {
        //
    }
}
