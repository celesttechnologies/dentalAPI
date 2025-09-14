<?php

namespace App\Http\Controllers;

use App\Models\EcgActivityEvent;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EcgActivityEventService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EcgActivityEventResource;
use App\Http\Requests\StoreEcgActivityEventRequest;
use App\Http\Requests\UpdateEcgActivityEventRequest;

class EcgActivityEventController extends Controller
{
    use ApiResponse;

    public function __construct(private EcgActivityEventService $eventService)
    {
    }

    /**
     * @group EcgActivityEvent
     *
     * @method GET
     *
     * List all ecgactivityevent
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "events": [
     *                 {
     *                     "event_activity_id": 1,
     *                     "clinic_id": 1,
     *                     "patient_id": 1,
     *                     "event_type_id": 1,
     *                     "event_related_id": 1,
     *                     "event_type_name": "Example Name",
     *                     "event_details": "Example value",
     *                     "device_type_id": 1,
     *                     "ip_address": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "event_related_file_id": 1
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

            $data = $this->eventService->getEvents($perPage);

            return $this->successResponse([
                'events' => EcgActivityEventResource::collection($data['events']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG activity events: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EcgActivityEvent
     *
     * @method GET
     *
     * Create ecgactivityevent
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "event": {
     *                 "event_activity_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "event_type_id": 1,
     *                 "event_related_id": 1,
     *                 "event_type_name": "Example Name",
     *                 "event_details": "Example value",
     *                 "device_type_id": 1,
     *                 "ip_address": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "event_related_file_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgActivityEventResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EcgActivityEvent
     *
     * @method POST
     *
     * Create a new ecgactivityevent
     *
     * @post /
     *
     * @bodyParam EventActivityID string required. Maximum length: 255. Example: "Example EventActivityID"
     * @bodyParam ClinicID string optional. nullable. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. nullable. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam EventTypeID number required. integer. Example: 1
     * @bodyParam EventRelatedID string optional. nullable. Maximum length: 255. Example: "Example EventRelatedID"
     * @bodyParam EventTypeName string optional. nullable. Maximum length: 255. Example: "Example EventTypeName"
     * @bodyParam EventDetails string optional. nullable. Example: "Example EventDetails"
     * @bodyParam DeviceTypeID string optional. nullable. Maximum length: 255. Example: "Example DeviceTypeID"
     * @bodyParam IpAddress string optional. nullable. Maximum length: 255. Example: "Example IpAddress"
     * @bodyParam Isdeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam EventRelatedFileId number optional. nullable. integer. Example: 1
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "event": {
     *                 "event_activity_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "event_type_id": 1,
     *                 "event_related_id": 1,
     *                 "event_type_name": "Example Name",
     *                 "event_details": "Example value",
     *                 "device_type_id": 1,
     *                 "ip_address": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "event_related_file_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgActivityEventResource
     */
    public function store(StoreEcgActivityEventRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $event = $this->eventService->createEvent($validatedData);

            return $this->successResponse([
                'message' => 'ECG Activity Event created successfully',
                'event' => new EcgActivityEventResource($event)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating ECG Activity Event: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create ECG Activity Event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgActivityEvent
     *
     * @method GET
     *
     * Get a specific ecgactivityevent
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgactivityevent to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "event": {
     *                 "event_activity_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "event_type_id": 1,
     *                 "event_related_id": 1,
     *                 "event_type_name": "Example Name",
     *                 "event_details": "Example value",
     *                 "device_type_id": 1,
     *                 "ip_address": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "event_related_file_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgActivityEventResource
     */
    public function show(EcgActivityEvent $ecgActivityEvent)
    {
        //
    }

    /**
     * @group EcgActivityEvent
     *
     * @method GET
     *
     * Edit ecgactivityevent
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgactivityevent to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "event": {
     *                 "event_activity_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "event_type_id": 1,
     *                 "event_related_id": 1,
     *                 "event_type_name": "Example Name",
     *                 "event_details": "Example value",
     *                 "device_type_id": 1,
     *                 "ip_address": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "event_related_file_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgActivityEventResource
     */
    public function edit(EcgActivityEvent $ecgActivityEvent)
    {
        //
    }

    /**
     * @group EcgActivityEvent
     *
     * @method PUT
     *
     * Update an existing ecgactivityevent
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgactivityevent to update. Example: 1
     *
     * @bodyParam EventActivityID string optional. Maximum length: 255. Example: "Example EventActivityID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam EventTypeID number optional. integer. Example: 1
     * @bodyParam EventRelatedID string optional. nullable. Maximum length: 255. Example: "Example EventRelatedID"
     * @bodyParam EventTypeName string optional. nullable. Maximum length: 255. Example: "Example EventTypeName"
     * @bodyParam EventDetails string optional. nullable. Example: "Example EventDetails"
     * @bodyParam DeviceTypeID string optional. nullable. Maximum length: 255. Example: "Example DeviceTypeID"
     * @bodyParam IpAddress string optional. nullable. Maximum length: 255. Example: "Example IpAddress"
     * @bodyParam Isdeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam EventRelatedFileId number optional. nullable. integer. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "event": {
     *                 "event_activity_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "event_type_id": 1,
     *                 "event_related_id": 1,
     *                 "event_type_name": "Example Name",
     *                 "event_details": "Example value",
     *                 "device_type_id": 1,
     *                 "ip_address": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "event_related_file_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgActivityEventResource
     */
    public function update(UpdateEcgActivityEventRequest $request, EcgActivityEvent $ecgActivityEvent)
    {
        try {
            $validatedData = $request->validated();

            $updatedEvent = $this->eventService->updateEvent($ecgActivityEvent, $validatedData);

            return $this->successResponse([
                'message' => 'ECG Activity Event updated successfully',
                'event' => new EcgActivityEventResource($updatedEvent)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating ECG Activity Event: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update ECG Activity Event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgActivityEvent
     *
     * @method DELETE
     *
     * Delete a ecgactivityevent
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgactivityevent to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcgActivityEvent $ecgActivityEvent)
    {
        //
    }
}
