<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonalReminderNoteResource; // Assuming you have a resource for Personal Reminder Note
use App\Models\PersonalReminderNote;
use App\Services\PersonalReminderNoteService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePersonalReminderNoteRequest;
use App\Http\Requests\UpdatePersonalReminderNoteRequest;

class PersonalReminderNoteController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PersonalReminderNoteService $personalReminderNoteService)
    {
    }

    /**
     * @group PersonalReminderNote
     *
     * @method GET
     *
     * List all personalremindernote
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personal_reminder_notes": [
     *                 {
     *                     "personal_reminder_notes_id": 1,
     *                     "reminder_id": 1,
     *                     "notes_date": "Example value",
     *                     "notes": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value"
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
            $data = $this->personalReminderNoteService->getPersonalReminderNotes($perPage);

            return $this->successResponse([
                'personal_reminder_notes' => PersonalReminderNoteResource::collection($data['personal_reminder_notes']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Personal Reminder Notes: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PersonalReminderNote
     *
     * @method GET
     *
     * Create personalremindernote
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder_note": {
     *                 "personal_reminder_notes_id": 1,
     *                 "reminder_id": 1,
     *                 "notes_date": "Example value",
     *                 "notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderNoteResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PersonalReminderNote
     *
     * @method POST
     *
     * Create a new personalremindernote
     *
     * @post /
     *
     * @bodyParam ReminderId string required. Maximum length: 255. Example: "Example ReminderId"
     * @bodyParam NotesDate string required. date. Example: "Example NotesDate"
     * @bodyParam Notes string required. Example: "Example Notes"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder_note": {
     *                 "personal_reminder_notes_id": 1,
     *                 "reminder_id": 1,
     *                 "notes_date": "Example value",
     *                 "notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderNoteResource
     */
    public function store(StorePersonalReminderNoteRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $reminderNote = $this->personalReminderNoteService->createReminderNote($validatedData);

            return $this->successResponse([
                'message' => 'Personal Reminder Note created successfully',
                'reminder_note' => new PersonalReminderNoteResource($reminderNote)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating Personal Reminder Note: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create Personal Reminder Note',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PersonalReminderNote
     *
     * @method GET
     *
     * Get a specific personalremindernote
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the personalremindernote to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder_note": {
     *                 "personal_reminder_notes_id": 1,
     *                 "reminder_id": 1,
     *                 "notes_date": "Example value",
     *                 "notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderNoteResource
     */
    public function show(PersonalReminderNote $personalReminderNote)
    {
        //
    }

    /**
     * @group PersonalReminderNote
     *
     * @method GET
     *
     * Edit personalremindernote
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the personalremindernote to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder_note": {
     *                 "personal_reminder_notes_id": 1,
     *                 "reminder_id": 1,
     *                 "notes_date": "Example value",
     *                 "notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderNoteResource
     */
    public function edit(PersonalReminderNote $personalReminderNote)
    {
        //
    }

    /**
     * @group PersonalReminderNote
     *
     * @method PUT
     *
     * Update an existing personalremindernote
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the personalremindernote to update. Example: 1
     *
     * @bodyParam ReminderId string optional. Maximum length: 255. Example: "Example ReminderId"
     * @bodyParam NotesDate string optional. date. Example: "Example NotesDate"
     * @bodyParam Notes string optional. Example: "Example Notes"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "reminder_note": {
     *                 "personal_reminder_notes_id": 1,
     *                 "reminder_id": 1,
     *                 "notes_date": "Example value",
     *                 "notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PersonalReminderNoteResource
     */
    public function update(UpdatePersonalReminderNoteRequest $request, PersonalReminderNote $personalReminderNote)
    {
        try {
            $validatedData = $request->validated();

            $updatedReminderNote = $this->personalReminderNoteService->updateReminderNote($personalReminderNote, $validatedData);

            return $this->successResponse([
                'message' => 'Personal Reminder Note updated successfully',
                'reminder_note' => new PersonalReminderNoteResource($updatedReminderNote)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating Personal Reminder Note: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update Personal Reminder Note',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PersonalReminderNote
     *
     * @method DELETE
     *
     * Delete a personalremindernote
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the personalremindernote to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalReminderNote $personalReminderNote)
    {
        //
    }
}
