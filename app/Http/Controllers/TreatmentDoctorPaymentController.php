<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTreatmentDoctorPaymentRequest;
use App\Http\Requests\UpdateTreatmentDoctorPaymentRequest;
use App\Http\Resources\TreatmentDoctorPaymentResource;
use App\Models\TreatmentDoctorPayment;
use App\Services\TreatmentDoctorPaymentService;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Log;

class TreatmentDoctorPaymentController extends Controller
{
    use ApiResponse;

    public function __construct(private TreatmentDoctorPaymentService $treatmentDoctorPaymentService)
    {
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method GET
     *
     * List all treatmentdoctorpayment
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_doctor_payments": [
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
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->treatmentDoctorPaymentService->getTreatmentDoctorPayments($perPage);

            return $this->successResponse([
                'treatment_doctor_payments' => TreatmentDoctorPaymentResource::collection($data['treatment_doctor_payments']),
                'pagination' => $data['pagination'],
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Treatment Doctor Payments: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method GET
     *
     * Create treatmentdoctorpayment
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_payment": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentDoctorPaymentResource
     */
    public function create()
    {
        //
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method POST
     *
     * Create a new treatmentdoctorpayment
     *
     * @post /
     *
     * @bodyParam TreatmentDoneId string required. Maximum length: 255. Example: "Example TreatmentDoneId"
     * @bodyParam ProviderId string required. Maximum length: 255. Example: "1"
     * @bodyParam Amount number required. numeric. Example: 1
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam AddedOn string required. Example: "Example AddedOn"
     * @bodyParam AddedBy string required. Example: "Example AddedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_payment": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentDoctorPaymentResource
     */
    public function store(StoreTreatmentDoctorPaymentRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $doctorPayment = $this->treatmentDoctorPaymentService->createDoctorPayment($validatedData);

            return $this->successResponse([
                'message' => 'Doctor payment created successfully',
                'doctor_payment' => new TreatmentDoctorPaymentResource($doctorPayment)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating doctor payment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create doctor payment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method GET
     *
     * Get a specific treatmentdoctorpayment
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the treatmentdoctorpayment to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_payment": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentDoctorPaymentResource
     */
    public function show(TreatmentDoctorPayment $treatmentDoctorPayment)
    {
        //
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method GET
     *
     * Edit treatmentdoctorpayment
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the treatmentdoctorpayment to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_payment": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentDoctorPaymentResource
     */
    public function edit(TreatmentDoctorPayment $treatmentDoctorPayment)
    {
        //
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method PUT
     *
     * Update an existing treatmentdoctorpayment
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the treatmentdoctorpayment to update. Example: 1
     *
     * @bodyParam TreatmentDoneId string optional. Maximum length: 255. Example: "Example TreatmentDoneId"
     * @bodyParam ProviderId string optional. Maximum length: 255. Example: "1"
     * @bodyParam Amount number optional. numeric. Example: 1
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_payment": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentDoctorPaymentResource
     */
    public function update(UpdateTreatmentDoctorPaymentRequest $request, TreatmentDoctorPayment $treatmentDoctorPayment)
    {
        try {
            $validatedData = $request->validated();

            $updatedDoctorPayment = $this->treatmentDoctorPaymentService->updateDoctorPayment($treatmentDoctorPayment, $validatedData);

            return $this->successResponse([
                'message' => 'Doctor payment updated successfully',
                'doctor_payment' => new TreatmentDoctorPaymentResource($updatedDoctorPayment)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating doctor payment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update doctor payment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group TreatmentDoctorPayment
     *
     * @method DELETE
     *
     * Delete a treatmentdoctorpayment
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the treatmentdoctorpayment to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreatmentDoctorPayment $treatmentDoctorPayment)
    {
        //
    }
}
