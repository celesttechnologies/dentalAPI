<?php

namespace App\Http\Controllers;

use App\Models\PatientDrugsPrescription;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Exception;
use App\Services\PatientDrugsPrescriptionService; // Import the service
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePatientDrugsPrescriptionRequest; // Import the request class
use App\Http\Requests\UpdatePatientDrugsPrescriptionRequest; // Import the request class
use App\Http\Resources\PatientDrugsPrescriptionResource; // Import the resource class
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup DrugsPrescription
 * @subgroupDescription PatientDrugsPrescriptionController handles the CRUD operations for patient drugs prescription controller.
 */
class PatientDrugsPrescriptionController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDrugsPrescriptionService $patientDrugsPrescriptionService)
    {
    }

    /**
     * @group PatientDrugsPrescription
     *
     * @method GET
     *
     * List all patientdrugsprescription
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "prescriptions": [
     *                 {
     *                     "prescription_id": 1,
     *                     "patient_prescription_id": 1,
     *                     "drug_id": 1,
     *                     "frequency_id": 1,
     *                     "dosage_id": 1,
     *                     "duration": "Example value",
     *                     "drug_note": "Example value"
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientDrugsPrescriptionService->getPrescriptions($patient, $perPage);

            return $this->successResponse([
                'prescriptions' => PatientDrugsPrescriptionResource::collection($data['prescriptions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Drugs Prescriptions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(), // Include the error message for debugging
                'code' => $e->getCode(), // Include the error code if applicable
            ]);
        }
    }

    /**
     * @group PatientDrugsPrescription
     *
     * @method POST
     *
     * Create a new patientdrugsprescription
     *
     * @post /
     *
     * @bodyParam PatientPrescriptionID string required. Maximum length: 255. Example: "Example PatientPrescriptionID"
     * @bodyParam DrugID string required. Maximum length: 255. Example: "Example DrugID"
     * @bodyParam FrequencyID string required. Maximum length: 255. Example: "Example FrequencyID"
     * @bodyParam DosageID string required. Maximum length: 255. Example: "Example DosageID"
     * @bodyParam Duration string required. Example: "Example Duration"
     * @bodyParam DrugNote string required. Example: "Example DrugNote"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "prescription": {
     *                 "prescription_id": 1,
     *                 "patient_prescription_id": 1,
     *                 "drug_id": 1,
     *                 "frequency_id": 1,
     *                 "dosage_id": 1,
     *                 "duration": "Example value",
     *                 "drug_note": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDrugsPrescriptionResource
     */
    public function store(StorePatientDrugsPrescriptionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $prescription = $this->patientDrugsPrescriptionService->createPrescription($validatedData);

            return $this->successResponse([
                'message' => 'Prescription created successfully',
                'prescription' => new PatientDrugsPrescriptionResource($prescription)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating prescription: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create prescription',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDrugsPrescription
     *
     * @method PUT
     *
     * Update an existing patientdrugsprescription
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdrugsprescription to update. Example: 1
     *
     * @bodyParam PatientPrescriptionID string optional. Maximum length: 255. Example: "Example PatientPrescriptionID"
     * @bodyParam DrugID string optional. Maximum length: 255. Example: "Example DrugID"
     * @bodyParam FrequencyID string optional. Maximum length: 255. Example: "Example FrequencyID"
     * @bodyParam DosageID string optional. Maximum length: 255. Example: "Example DosageID"
     * @bodyParam Duration string optional. Example: "Example Duration"
     * @bodyParam DrugNote string optional. Example: "Example DrugNote"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "prescription": {
     *                 "prescription_id": 1,
     *                 "patient_prescription_id": 1,
     *                 "drug_id": 1,
     *                 "frequency_id": 1,
     *                 "dosage_id": 1,
     *                 "duration": "Example value",
     *                 "drug_note": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDrugsPrescriptionResource
     */
    public function update(UpdatePatientDrugsPrescriptionRequest $request, PatientDrugsPrescription $patientDrugsPrescription)
    {
        try {
            $validatedData = $request->validated();

            $updatedPrescription = $this->patientDrugsPrescriptionService->updatePrescription($patientDrugsPrescription, $validatedData);

            return $this->successResponse([
                'message' => 'Prescription updated successfully',
                'prescription' => new PatientDrugsPrescriptionResource($updatedPrescription)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating prescription: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update prescription',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
