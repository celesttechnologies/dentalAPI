<?php

namespace App\Http\Controllers;

use App\Models\PatientAllergyAttribute;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePatientAllergyAttributeRequest;
use App\Http\Requests\UpdatePatientAllergyAttributeRequest;
use App\Http\Resources\PatientAllergyAttributeResource;
use App\Models\Patient;
use App\Services\PatientAllergyAttributeService;
use App\Traits\ApiResponse;

/**
 * @group Patient
 * @subgroup AllergyAttribute
 * @subgroupDescription PatientAllergyAttributeController handles the CRUD operations for patient allergy attributes.
 */
class PatientAllergyAttributeController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientAllergyAttributeService $patientAllergyAttributeService)
    {
    }

    /**
     * @group PatientAllergyAttribute
     *
     * @method GET
     *
     * List all patientallergyattribute
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "attributes": [
     *                 {
     *                     "ID": "Example value",
     *                     "Category": "Example value",
     *                     "AttributesID": "Example value",
     *                     "AttributeValue": "Example value",
     *                     "AttributeText": "Example value",
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
            $data = $this->patientAllergyAttributeService->getAllergyAttributes($patient, $perPage);

            return $this->successResponse([
                'attributes' => PatientAllergyAttributeResource::collection($data['attributes']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Other Communication Groups: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientAllergyAttribute
     *
     * @method POST
     *
     * Create a new patientallergyattribute
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam AllergyAttributesCategory string required. Example: "Example AllergyAttributesCategory"
     * @bodyParam AllergyAttributesID string required. Maximum length: 255. Example: "Example AllergyAttributesID"
     * @bodyParam AllergyAttributeValue string required. Example: "Example AllergyAttributeValue"
     * @bodyParam AllergyAttributeText string required. Example: "Example AllergyAttributeText"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "allergy_attribute": {
     *                 "ID": "Example value",
     *                 "Category": "Example value",
     *                 "AttributesID": "Example value",
     *                 "AttributeValue": "Example value",
     *                 "AttributeText": "Example value",
     *                 "LastUpdatedBy": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientAllergyAttributeResource
     */
    public function store(StorePatientAllergyAttributeRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $allergyAttribute = $this->patientAllergyAttributeService->createAllergyAttribute($validatedData);

            return $this->successResponse([
                'message' => 'Allergy attribute created successfully',
                'allergy_attribute' => new PatientAllergyAttributeResource($allergyAttribute)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating allergy attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create allergy attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientAllergyAttribute
     *
     * @method PUT
     *
     * Update an existing patientallergyattribute
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientallergyattribute to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam AllergyAttributesCategory string optional. Example: "Example AllergyAttributesCategory"
     * @bodyParam AllergyAttributesID string optional. Maximum length: 255. Example: "Example AllergyAttributesID"
     * @bodyParam AllergyAttributeValue string optional. Example: "Example AllergyAttributeValue"
     * @bodyParam AllergyAttributeText string optional. Example: "Example AllergyAttributeText"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "allergy_attribute": {
     *                 "ID": "Example value",
     *                 "Category": "Example value",
     *                 "AttributesID": "Example value",
     *                 "AttributeValue": "Example value",
     *                 "AttributeText": "Example value",
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
     * @return PatientAllergyAttributeResource
     */
    public function update(UpdatePatientAllergyAttributeRequest $request, PatientAllergyAttribute $patientAllergyAttribute)
    {
        try {
            $validatedData = $request->validated();

            $updatedAllergyAttribute = $this->patientAllergyAttributeService->updateAllergyAttribute($patientAllergyAttribute, $validatedData);

            return $this->successResponse([
                'message' => 'Allergy attribute updated successfully',
                'allergy_attribute' => new PatientAllergyAttributeResource($updatedAllergyAttribute)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating allergy attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update allergy attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
