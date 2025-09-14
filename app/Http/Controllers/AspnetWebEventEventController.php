<?php

namespace App\Http\Controllers;

use App\Models\AspnetWebEventEvent;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetWebEventService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AspnetWebEventResource;
use App\Http\Requests\StoreAspnetWebEventEventRequest;
use App\Http\Requests\UpdateAspnetWebEventEventRequest;

class AspnetWebEventEventController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AspnetWebEventService $aspnetWebEventService
    ) {
    }

    /**
     * @group AspnetWebEventEvent
     *
     * @method GET
     *
     * List all aspnetwebeventevent
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "webEvents": [
     *                 {
     *                     "event_id": 1,
     *                     "event_time_utc": "Example value",
     *                     "event_time": "Example value",
     *                     "event_type": "Example value",
     *                     "event_sequence": "Example value",
     *                     "event_occurrence": "Example value",
     *                     "event_code": "Example value",
     *                     "event_detail_code": "Example value",
     *                     "message": "Example value",
     *                     "application_path": "Example value",
     *                     "application_virtual_path": "Example value",
     *                     "machine_name": "Example Name",
     *                     "request_url": "Example value",
     *                     "exception_type": "Example value",
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

            $webEvents = $this->aspnetWebEventService->getAspnetWebEvents($perPage);

            return $this->successResponse([
                'webEvents' => AspnetWebEventResource::collection($webEvents['webEvents']),
                'pagination' => $webEvents['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching web events: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group AspnetWebEventEvent
     *
     * @method GET
     *
     * Create aspnetwebeventevent
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_event": {
     *                 "event_id": 1,
     *                 "event_time_utc": "Example value",
     *                 "event_time": "Example value",
     *                 "event_type": "Example value",
     *                 "event_sequence": "Example value",
     *                 "event_occurrence": "Example value",
     *                 "event_code": "Example value",
     *                 "event_detail_code": "Example value",
     *                 "message": "Example value",
     *                 "application_path": "Example value",
     *                 "application_virtual_path": "Example value",
     *                 "machine_name": "Example Name",
     *                 "request_url": "Example value",
     *                 "exception_type": "Example value",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetWebEventResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetWebEventEvent
     *
     * @method POST
     *
     * Create a new aspnetwebeventevent
     *
     * @post /
     *
     * @bodyParam EventId string required. Maximum length: 255. Example: "Example EventId"
     * @bodyParam EventTime string required. date. Example: "Example EventTime"
     * @bodyParam EventType string required. Maximum length: 255. Example: "Example EventType"
     * @bodyParam EventSequence number required. integer. Example: 1
     * @bodyParam Details string optional. nullable. Example: "Example Details"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "web_event": {
     *                 "event_id": 1,
     *                 "event_time_utc": "Example value",
     *                 "event_time": "Example value",
     *                 "event_type": "Example value",
     *                 "event_sequence": "Example value",
     *                 "event_occurrence": "Example value",
     *                 "event_code": "Example value",
     *                 "event_detail_code": "Example value",
     *                 "message": "Example value",
     *                 "application_path": "Example value",
     *                 "application_virtual_path": "Example value",
     *                 "machine_name": "Example Name",
     *                 "request_url": "Example value",
     *                 "exception_type": "Example value",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetWebEventResource
     */
    public function store(StoreAspnetWebEventEventRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $webEvent = $this->aspnetWebEventService->createWebEventEvent($validatedData);

            return $this->successResponse([
                'message' => 'Web event created successfully',
                'web_event' => new AspnetWebEventResource($webEvent)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating web event: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create web event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetWebEventEvent
     *
     * @method GET
     *
     * Get a specific aspnetwebeventevent
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetwebeventevent to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_event": {
     *                 "event_id": 1,
     *                 "event_time_utc": "Example value",
     *                 "event_time": "Example value",
     *                 "event_type": "Example value",
     *                 "event_sequence": "Example value",
     *                 "event_occurrence": "Example value",
     *                 "event_code": "Example value",
     *                 "event_detail_code": "Example value",
     *                 "message": "Example value",
     *                 "application_path": "Example value",
     *                 "application_virtual_path": "Example value",
     *                 "machine_name": "Example Name",
     *                 "request_url": "Example value",
     *                 "exception_type": "Example value",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetWebEventResource
     */
    public function show(AspnetWebEventEvent $aspnetWebEventEvent)
    {
        //
    }

    /**
     * @group AspnetWebEventEvent
     *
     * @method GET
     *
     * Edit aspnetwebeventevent
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetwebeventevent to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_event": {
     *                 "event_id": 1,
     *                 "event_time_utc": "Example value",
     *                 "event_time": "Example value",
     *                 "event_type": "Example value",
     *                 "event_sequence": "Example value",
     *                 "event_occurrence": "Example value",
     *                 "event_code": "Example value",
     *                 "event_detail_code": "Example value",
     *                 "message": "Example value",
     *                 "application_path": "Example value",
     *                 "application_virtual_path": "Example value",
     *                 "machine_name": "Example Name",
     *                 "request_url": "Example value",
     *                 "exception_type": "Example value",
     *                 "details": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetWebEventResource
     */
    public function edit(AspnetWebEventEvent $aspnetWebEventEvent)
    {
        //
    }

    /**
     * @group AspnetWebEventEvent
     *
     * @method PUT
     *
     * Update an existing aspnetwebeventevent
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetwebeventevent to update. Example: 1
     *
     * @bodyParam EventId string optional. Maximum length: 255. Example: "Example EventId"
     * @bodyParam EventTime string optional. date. Example: "Example EventTime"
     * @bodyParam EventType string optional. Maximum length: 255. Example: "Example EventType"
     * @bodyParam EventSequence number optional. integer. Example: 1
     * @bodyParam Details string optional. nullable. Example: "Example Details"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_event": {
     *                 "event_id": 1,
     *                 "event_time_utc": "Example value",
     *                 "event_time": "Example value",
     *                 "event_type": "Example value",
     *                 "event_sequence": "Example value",
     *                 "event_occurrence": "Example value",
     *                 "event_code": "Example value",
     *                 "event_detail_code": "Example value",
     *                 "message": "Example value",
     *                 "application_path": "Example value",
     *                 "application_virtual_path": "Example value",
     *                 "machine_name": "Example Name",
     *                 "request_url": "Example value",
     *                 "exception_type": "Example value",
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
     * @return AspnetWebEventResource
     */
    public function update(UpdateAspnetWebEventEventRequest $request, AspnetWebEventEvent $aspnetWebEventEvent)
    {
        try {
            $validatedData = $request->validated();

            $updatedWebEvent = $this->aspnetWebEventService->updateWebEventEvent($aspnetWebEventEvent, $validatedData);

            return $this->successResponse([
                'message' => 'Web event updated successfully',
                'web_event' => new AspnetWebEventResource($updatedWebEvent)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating web event: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update web event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetWebEventEvent
     *
     * @method DELETE
     *
     * Delete a aspnetwebeventevent
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetwebeventevent to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetWebEventEvent $aspnetWebEventEvent)
    {
        //
    }
}
