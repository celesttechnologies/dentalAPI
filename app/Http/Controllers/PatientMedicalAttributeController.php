<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientMedicalAttributeResource;
use App\Models\PatientMedicalAttribute;
use App\Services\PatientMedicalAttributeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientMedicalAttributeRequest;
use App\Http\Requests\UpdatePatientMedicalAttributeRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Medical Attributes
 * @subgroupDescription PatientMedicalAttributeController handles the CRUD operations for patient medical certificate attribute controller.
 */
class PatientMedicalAttributeController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientMedicalAttributeService $patientMedicalAttributeService)
    {
    }

    /**
     * @group PatientMedicalAttribute
     *
     * @method GET
     *
     * List all patientmedicalattribute
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "medical_attributes": [
     *                 {
     *                     "PatientMedicalDetailID": "Example value",
     *                     "MedicalAttributesCategory": "Example value",
     *                     "MedicalAttributesID": "Example value",
     *                     "MedicalAttributeValue": "Example value",
     *                     "MedicalAttributeText": "Example value",
     *                     "MedicalHistoryDate": "Example value",
     *                     "LastUpdatedBy": "Example value"
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
            $data = $this->patientMedicalAttributeService->getMedicalAttributes($patient, $perPage);

            return $this->successResponse([
                'medical_attributes' => PatientMedicalAttributeResource::collection($data['medical_attributes']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Medical Attributes: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientMedicalAttribute
     *
     * @method POST
     *
     * Create a new patientmedicalattribute
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam Date string required. date. Example: "Example Date"
     * @bodyParam MedicalAttributes string required. Example: "Example MedicalAttributes"
     * @bodyParam MedicalAttributesCategory string required. Example: "Example MedicalAttributesCategory"
     * @bodyParam MedicalAttributeValue string required. Example: "Example MedicalAttributeValue"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "medical_attribute": {
     *                 "PatientMedicalDetailID": "Example value",
     *                 "MedicalAttributesCategory": "Example value",
     *                 "MedicalAttributesID": "Example value",
     *                 "MedicalAttributeValue": "Example value",
     *                 "MedicalAttributeText": "Example value",
     *                 "MedicalHistoryDate": "Example value",
     *                 "LastUpdatedBy": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientMedicalAttributeResource
     */
    public function store(StorePatientMedicalAttributeRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $medicalAttribute = $this->patientMedicalAttributeService->createMedicalAttribute($validatedData);

            return $this->successResponse([
                'message' => 'Medical attribute created successfully',
                'medical_attribute' => new PatientMedicalAttributeResource($medicalAttribute)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating medical attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create medical attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientMedicalAttribute
     *
     * @method PUT
     *
     * Update an existing patientmedicalattribute
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientmedicalattribute to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam Date string optional. date. Example: "Example Date"
     * @bodyParam MedicalAttributes string optional. Example: "Example MedicalAttributes"
     * @bodyParam MedicalAttributesCategory string optional. Example: "Example MedicalAttributesCategory"
     * @bodyParam MedicalAttributeValue string optional. Example: "Example MedicalAttributeValue"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "medical_attribute": {
     *                 "PatientMedicalDetailID": "Example value",
     *                 "MedicalAttributesCategory": "Example value",
     *                 "MedicalAttributesID": "Example value",
     *                 "MedicalAttributeValue": "Example value",
     *                 "MedicalAttributeText": "Example value",
     *                 "MedicalHistoryDate": "Example value",
     *                 "LastUpdatedBy": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientMedicalAttributeResource
     */
    public function update(UpdatePatientMedicalAttributeRequest $request, PatientMedicalAttribute $patientMedicalAttribute)
    {
        try {
            $validatedData = $request->validated();

            $updatedMedicalAttribute = $this->patientMedicalAttributeService->updateMedicalAttribute($patientMedicalAttribute, $validatedData);

            return $this->successResponse([
                'message' => 'Medical attribute updated successfully',
                'medical_attribute' => new PatientMedicalAttributeResource($updatedMedicalAttribute)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating medical attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update medical attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
