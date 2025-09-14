<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonalReminderResource; // Assuming you have a resource for Personal Reminder
use App\Models\PersonalReminder;
use App\Services\PersonalReminderService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePersonalReminderRequest;
use App\Http\Requests\UpdatePersonalReminderRequest;

class PersonalReminderController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PersonalReminderService $reminderService)
    {
    }

    /**
     * @group PersonalReminder
     *
     * @method GET
     *
     * List all personalreminder
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personal_reminders": [
     *                 {
     *                     "reminder_id": 1,
     *                     "clinic_id": 1,
     *                     "patient_id": 1,
     *                     "user_id": 1,
     *                     "provider_id": 1,
     *                     "reminder_type_id": 1,
     *                     "reminder_date": "Example value",
     *                     "reminder_subject": "Example value",
     *                     "reminder_description": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "rowguid": 1,
     *                     "status_id": 1
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
    public function index(Request $request, $patientId = null)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->reminderService->getPersonalReminders($perPage, $patientId);

            return $this->successResponse([
                'personal_reminders' => PersonalReminderResource::collection($data['personal_reminders']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Personal Reminders: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PersonalReminder
     *
     * @method GET
     *
     * Create personalreminder
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder": {
     *                 "reminder_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "user_id": 1,
     *                 "provider_id": 1,
     *                 "reminder_type_id": 1,
     *                 "reminder_date": "Example value",
     *                 "reminder_subject": "Example value",
     *                 "reminder_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "rowguid": 1,
     *                 "status_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PersonalReminder
     *
     * @method POST
     *
     * Create a new personalreminder
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam UserID string required. Maximum length: 255. Example: "Example UserID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ReminderTypeID string required. Maximum length: 255. Example: "Example ReminderTypeID"
     * @bodyParam ReminderDate string required. date. Example: "Example ReminderDate"
     * @bodyParam ReminderSubject string required. Example: "Example ReminderSubject"
     * @bodyParam ReminderDescription string required. Example: "Example ReminderDescription"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam StatusId string required. Maximum length: 255. Example: "Example StatusId"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder": {
     *                 "reminder_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "user_id": 1,
     *                 "provider_id": 1,
     *                 "reminder_type_id": 1,
     *                 "reminder_date": "Example value",
     *                 "reminder_subject": "Example value",
     *                 "reminder_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "rowguid": 1,
     *                 "status_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderResource
     */
    public function store(StorePersonalReminderRequest $request, $patientId = null)
    {
        try {
            $validatedData = $request->validated();

            $reminder = $this->reminderService->createReminder($validatedData);

            return $this->successResponse([
                'message' => 'Personal reminder created successfully',
                'reminder' => new PersonalReminderResource($reminder)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating personal reminder: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create personal reminder',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PersonalReminder
     *
     * @method GET
     *
     * Get a specific personalreminder
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the personalreminder to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder": {
     *                 "reminder_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "user_id": 1,
     *                 "provider_id": 1,
     *                 "reminder_type_id": 1,
     *                 "reminder_date": "Example value",
     *                 "reminder_subject": "Example value",
     *                 "reminder_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "rowguid": 1,
     *                 "status_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderResource
     */
    public function show(PersonalReminder $personalReminder)
    {
        //
    }

    /**
     * @group PersonalReminder
     *
     * @method GET
     *
     * Edit personalreminder
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the personalreminder to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder": {
     *                 "reminder_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "user_id": 1,
     *                 "provider_id": 1,
     *                 "reminder_type_id": 1,
     *                 "reminder_date": "Example value",
     *                 "reminder_subject": "Example value",
     *                 "reminder_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "rowguid": 1,
     *                 "status_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderResource
     */
    public function edit(PersonalReminder $personalReminder)
    {
        //
    }

    /**
     * @group PersonalReminder
     *
     * @method PUT
     *
     * Update an existing personalreminder
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the personalreminder to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam UserID string optional. Maximum length: 255. Example: "Example UserID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ReminderTypeID string optional. Maximum length: 255. Example: "Example ReminderTypeID"
     * @bodyParam ReminderDate string optional. date. Example: "Example ReminderDate"
     * @bodyParam ReminderSubject string optional. Example: "Example ReminderSubject"
     * @bodyParam ReminderDescription string optional. Example: "Example ReminderDescription"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam StatusId string optional. Maximum length: 255. Example: "Example StatusId"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder": {
     *                 "reminder_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "user_id": 1,
     *                 "provider_id": 1,
     *                 "reminder_type_id": 1,
     *                 "reminder_date": "Example value",
     *                 "reminder_subject": "Example value",
     *                 "reminder_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "rowguid": 1,
     *                 "status_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderResource
     */
    public function update(UpdatePersonalReminderRequest $request, $patientId = null, PersonalReminder $personalReminder)
    {
        try {
            $validatedData = $request->validated();

            $updatedReminder = $this->reminderService->updateReminder($personalReminder, $validatedData);

            return $this->successResponse([
                'message' => 'Personal reminder updated successfully',
                'reminder' => new PersonalReminderResource($updatedReminder)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating personal reminder: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update personal reminder',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PersonalReminder
     *
     * @method DELETE
     *
     * Delete a personalreminder
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the personalreminder to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalReminder $personalReminder)
    {
        //
    }
}
