<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientNoteRequest;
use App\Http\Requests\UpdatePatientNoteRequest;
use App\Services\PatientNoteService;
use App\Traits\ApiResponse;
use App\Http\Resources\PatientNoteResource;
use App\Models\Patient;

class PatientNoteController extends Controller
{
    use ApiResponse;

    protected $service;

    public function __construct(PatientNoteService $service)
    {
        $this->service = $service;
    }

    /**
     * @group PatientNote
     *
     * @method GET
     *
     * List all patientnote
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_notes": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "note": "Example value",
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
    public function index(Patient $patient)
    {
        try {
            $notes = $this->service->getAll($patient->id);
            return $this->successResponse([
                'patient_notes' => PatientNoteResource::collection($notes)
            ]);
        } catch (\Exception $e) {
            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientNote
     *
     * @method POST
     *
     * Create a new patientnote
     *
     * @post /
     *
     * @bodyParam Note string required. Example: "Example Note"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_note": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "note": "Example value",
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
     * @return PatientNoteResource
     */
    public function store(StorePatientNoteRequest $request, Patient $patient)
    {
        try {
            $note = $this->service->create($patient->id, $request->validated());
            return $this->successResponse([
                'message' => 'Patient note created successfully',
                'patient_note' => new PatientNoteResource($note)
            ], 201);
        } catch (\Exception $e) {
            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
