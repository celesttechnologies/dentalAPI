<?php

namespace App\Http\Controllers;

use App\Models\WaitingAreaPatient;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\WaitingAreaPatientService;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreWaitingAreaPatientRequest;
use App\Http\Requests\UpdateWaitingAreaPatientRequest;
use App\Http\Resources\WaitingAreaPatientResource;
use App\Models\Appointment;

class WaitingAreaPatientController extends Controller
{
    use ApiResponse;
    protected $waitingAreaPatientService;
    public function __construct(WaitingAreaPatientService $waitingAreaPatientService)
    {
        $this->waitingAreaPatientService = $waitingAreaPatientService;
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method GET
     *
     * List all waitingareapatient
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Attempt to fetch the patient list from the service
            $waitingAreaList = $this->waitingAreaPatientService->getWaitingAreaList();

            // If no patients are found, return a custom message
            if ($waitingAreaList->isEmpty()) {
                return $this->errorResponse(['message' => 'No waiting area patients found.'], 404);
            }

            // Return the patient list in a successful response
            return $this->successResponse(['waitingAreaList' => $waitingAreaList, 'message' => 'Waiting Area List']);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method GET
     *
     * Create waitingareapatient
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "waiting_area_patient": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return WaitingAreaPatientResource
     */
    public function create()
    {
        //
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method GET
     *
     * Direct waitingareapatient
     *
     * @get /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam AppointmentID string optional. nullable. Maximum length: 255. Example: "Example AppointmentID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientName string required. Example: "Example PatientName"
     * @bodyParam PatientPhone string required. Example: "Example PatientPhone"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ProviderName string required. Maximum length: 255. Example: "1"
     * @bodyParam StartDateTime string required. date. Example: "Example StartDateTime"
     * @bodyParam EndDateTime string optional. nullable. date. Example: "Example EndDateTime"
     * @bodyParam Comments string optional. nullable. Example: "Example Comments"
     * @bodyParam Status string optional. nullable. Example: "Example Status"
     * @bodyParam ReminderDate string optional. nullable. date. Example: "Example ReminderDate"
     * @bodyParam CancelledOn string optional. nullable. Example: "Example CancelledOn"
     * @bodyParam CancelledBy string optional. nullable. Example: "Example CancelledBy"
     * @bodyParam CancellationReason string optional. nullable. Example: "Example CancellationReason"
     * @bodyParam CancellationType string optional. nullable. Example: "Example CancellationType"
     * @bodyParam OperationTime string optional. nullable. Example: "Example OperationTime"
     * @bodyParam CompleteTime string optional. nullable. Example: "Example CompleteTime"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam WaitTime string optional. nullable. Example: "Example WaitTime"
     * @bodyParam ChairID string optional. nullable. uuid. Example: "Example ChairID"
     * @bodyParam CreatedBy string optional. nullable. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedBy string optional. nullable. Example: "Example LastUpdatedBy"
     * @bodyParam IsQueueNotificationSMSRequested string required. Example: "Example IsQueueNotificationSMSRequested"
     * @bodyParam QueueNotificationCount string required. Example: "Example QueueNotificationCount"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "waiting_area_patient": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return WaitingAreaPatientResource
     */
    public function direct(StoreWaitingAreaPatientRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $waitingAreaPatient = $this->waitingAreaPatientService->createWaitingAreaPatient($validatedData);

            return $this->successResponse([
                'message' => 'Patient added to waiting area successfully',
                'waiting_area_patient' => new WaitingAreaPatientResource($waitingAreaPatient)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error adding patient to waiting area: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to add patient to waiting area',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method POST
     *
     * Create a new waitingareapatient
     *
     * @post /
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "waiting_area_patient": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return WaitingAreaPatientResource
     */
    public function store(Request $request, Appointment $appointment)
    {
        try {
            $validatedData = $appointment->toArray();
            $validatedData['IsExistingPatient'] = true;
            $validatedData['Status'] = 1;
            $validatedData['MovedToWaitingArea'] = 1;

            $waitingAreaPatient = $this->waitingAreaPatientService->createWaitingAreaPatient($validatedData);
            if($waitingAreaPatient->AppointmentID) {
                $appointment->update(['MovedToWaitingArea' => 1]);
            } else {
                $appointment->update(['MovedToWaitingArea' => 0]);
            }

            return $this->successResponse([
                'message' => 'Patient added to waiting area successfully',
                'waiting_area_patient' => new WaitingAreaPatientResource($waitingAreaPatient)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error adding patient to waiting area: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to add patient to waiting area',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method GET
     *
     * Get a specific waitingareapatient
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the waitingareapatient to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "waiting_area_patient": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return WaitingAreaPatientResource
     */
    public function show(WaitingAreaPatient $waitingAreaPatient)
    {
        //
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method GET
     *
     * Edit waitingareapatient
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the waitingareapatient to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "waiting_area_patient": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return WaitingAreaPatientResource
     */
    public function edit(WaitingAreaPatient $waitingAreaPatient)
    {
        //
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method PUT
     *
     * Update an existing waitingareapatient
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the waitingareapatient to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam AppointmentID string optional. Maximum length: 255. Example: "Example AppointmentID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientName string optional. Example: "Example PatientName"
     * @bodyParam PatientPhone string optional. Example: "Example PatientPhone"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ProviderName string optional. Maximum length: 255. Example: "1"
     * @bodyParam StartDateTime string optional. date. Example: "Example StartDateTime"
     * @bodyParam EndDateTime string optional. date. Example: "Example EndDateTime"
     * @bodyParam Comments string optional. Example: "Example Comments"
     * @bodyParam Status string optional. Example: "Example Status"
     * @bodyParam ReminderDate string optional. date. Example: "Example ReminderDate"
     * @bodyParam CancelledOn string optional. Example: "Example CancelledOn"
     * @bodyParam CancelledBy string optional. Example: "Example CancelledBy"
     * @bodyParam CancellationReason string optional. Example: "Example CancellationReason"
     * @bodyParam CancellationType string optional. Example: "Example CancellationType"
     * @bodyParam ArrivalTime string optional. Example: "Example ArrivalTime"
     * @bodyParam OperationTime string optional. Example: "Example OperationTime"
     * @bodyParam CompleteTime string optional. Example: "Example CompleteTime"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam WaitTime string optional. Example: "Example WaitTime"
     * @bodyParam ChairID string optional. Maximum length: 255. Example: "Example ChairID"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam TokenNumber string optional. Example: "Example TokenNumber"
     * @bodyParam IsQueueNotificationSMSRequested string optional. Example: "Example IsQueueNotificationSMSRequested"
     * @bodyParam QueueNotificationCount string optional. Example: "Example QueueNotificationCount"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "waiting_area_patient": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return WaitingAreaPatientResource
     */
    public function update(UpdateWaitingAreaPatientRequest $request, WaitingAreaPatient $waitingAreaPatient)
    {
        try {
            $validatedData = $request->validated();

            $updatedWaitingAreaPatient = $this->waitingAreaPatientService->updateWaitingAreaPatient($waitingAreaPatient, $validatedData);

            return $this->successResponse([
                'message' => 'Waiting area patient updated successfully',
                'waiting_area_patient' => new WaitingAreaPatientResource($updatedWaitingAreaPatient)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating waiting area patient: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update waiting area patient',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group WaitingAreaPatient
     *
     * @method DELETE
     *
     * Delete a waitingareapatient
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the waitingareapatient to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaitingAreaPatient $waitingAreaPatient)
    {
        //
    }
}
