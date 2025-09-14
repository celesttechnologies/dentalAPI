<?php

namespace App\Http\Controllers;

use App\Models\PatientPersonalAttribute;
use App\Http\Resources\PatientPersonalAttributeResource; // Assuming you have a resource for Patient Personal Attribute
use App\Services\PatientPersonalAttributeService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientPersonalAttributeRequest; // Assuming you have a request for storing personal attributes
use App\Http\Requests\UpdatePatientPersonalAttributeRequest; // Assuming you have a request for updating personal attributes
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup PersonalAttributes
 * @subgroupDescription PatientPersonalAttributeController handles the CRUD operations for patient personal attribute controller.
 */
class PatientPersonalAttributeController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientPersonalAttributeService $patientPersonalAttributeService)
    {
    }

    /**
     * @group PatientPersonalAttribute
     *
     * @method GET
     *
     * List all patientpersonalattribute
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_personal_attributes": [
     *                 {
     *                     "patient_attribute_data_id": 1,
     *                     "clinic_id": 1,
     *                     "patient_id": 1,
     *                     "patient_attribute_id": 1,
     *                     "patient_attribute_data": "Example value",
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientPersonalAttributeService->getPatientPersonalAttributes($patient, $perPage);

            return $this->successResponse([
                'patient_personal_attributes' => PatientPersonalAttributeResource::collection($data['patient_personal_attributes']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Personal Attributes: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientPersonalAttribute
     *
     * @method POST
     *
     * Create a new patientpersonalattribute
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientAttributeID string required. Maximum length: 255. Example: "Example PatientAttributeID"
     * @bodyParam PatientAttributeData string required. Example: "Example PatientAttributeData"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "personal_attribute": {
     *                 "patient_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "patient_attribute_id": 1,
     *                 "patient_attribute_data": "Example value",
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
     * @return PatientPersonalAttributeResource
     */
    public function store(StorePatientPersonalAttributeRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $attribute = $this->patientPersonalAttributeService->createPersonalAttribute($validatedData);

            return $this->successResponse([
                'message' => 'Personal attribute created successfully',
                'personal_attribute' => new PatientPersonalAttributeResource($attribute)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating personal attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create personal attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientPersonalAttribute
     *
     * @method PUT
     *
     * Update an existing patientpersonalattribute
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientpersonalattribute to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientAttributeID string optional. Maximum length: 255. Example: "Example PatientAttributeID"
     * @bodyParam PatientAttributeData string optional. Example: "Example PatientAttributeData"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personal_attribute": {
     *                 "patient_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "patient_attribute_id": 1,
     *                 "patient_attribute_data": "Example value",
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
     * @return PatientPersonalAttributeResource
     */
    public function update(UpdatePatientPersonalAttributeRequest $request, PatientPersonalAttribute $patientPersonalAttribute)
    {
        try {
            $validatedData = $request->validated();

            $updatedAttribute = $this->patientPersonalAttributeService->updatePersonalAttribute($patientPersonalAttribute, $validatedData);

            return $this->successResponse([
                'message' => 'Personal attribute updated successfully',
                'personal_attribute' => new PatientPersonalAttributeResource($updatedAttribute)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating personal attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update personal attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
