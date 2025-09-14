<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\TreatmentResource;
use App\Models\Appointment;
use App\Models\Patient;
use App\Services\AppointmentService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    use ApiResponse;

    protected AppointmentService $appointmentService;

    public function __construct()
    {
        $this->appointmentService = new AppointmentService();
    }

    /**
     * @group Appointment
     *
     * @method GET
     *
     * List all appointment
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "appointments": [
     *                 []
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
            $data = $this->appointmentService->getAppointments($patientId, $perPage);

            return $this->successResponse([
                'appointments' => AppointmentResource::collection($data['appointments']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Treatments Done: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group Appointment
     *
     * @method POST
     *
     * Create a new appointment
     *
     * @post /
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "appointment_id": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AppointmentResource
     */
    public function store(AppointmentRequest $request)
    {
        try {
            // $appointmentId = Str::uuid();
            $validatedData = $request->validated();

            // Add patient context to appointment data
            // $validatedData['patient_id'] = $patient->PatientID;

            // AppointmentAggregate::retrieve($appointmentId)
            //     ->createAppointment($appointmentId, $validatedData)
            //     ->persist();

            $appointment = $this->appointmentService->createAppointment($validatedData);

            return $this->successResponse([
                'message' => 'Appointment created successfully',
                'appointment_id' => new AppointmentResource($appointment),
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating appointment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create appointment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Appointment
     *
     * @method PUT
     *
     * Update an existing appointment
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the appointment to update. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "appointment": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AppointmentResource
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        try {
            $validatedData = $request->validated();

            $updatedAppointment = $this->appointmentService->updateAppointment($appointment, $validatedData);

            return $this->successResponse([
                'message' => 'Appointment updated successfully',
                'appointment' => new AppointmentResource($updatedAppointment)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating appointment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update appointment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Appointment
     *
     * @method DELETE
     *
     * Delete a appointment
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the appointment to delete. Example: 1
     *
     * @response 204 scenario="Success" {
     *     {
     *         "data": {
     *             "appointments": [
     *                 []
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
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    /**
     * @group Appointment
     *
     * @method GET
     *
     * GetAppointmentsByStatus appointment
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "appointments": [
     *                 []
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
    public function getAppointmentsByStatus()
    {
        try {
            $appointments = $this->appointmentService->getAppointmentsByStatus();

            return $this->successResponse(['appointments' => AppointmentResource::collection($appointments), 'message' => 'Appointment List']);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    /**
     * @group Appointment
     *
     * @method GET
     *
     * GetTreatment appointment
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatments": [
     *                 []
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
    public function getTreatment($status)
    {
        try {
            $treatments = $this->appointmentService->getTreatment($status);

            return $this->successResponse(['treatments' => TreatmentResource::collection($treatments)]);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

}
