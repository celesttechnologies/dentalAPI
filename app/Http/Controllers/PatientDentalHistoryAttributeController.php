<?php

namespace App\Http\Controllers;

use App\Models\PatientDentalHistoryAttribute;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\PatientDentalHistoryAttributeService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientDentalHistoryAttributeResource;
use App\Http\Requests\StorePatientDentalHistoryAttributeRequest;
use App\Http\Requests\UpdatePatientDentalHistoryAttributeRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup DentalHistoryAttribute
 * @subgroupDescription PatientDentalHistoryAttributeController handles the CRUD operations for patient dental history attribute controller.
 */
class PatientDentalHistoryAttributeController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDentalHistoryAttributeService $historyService)
    {
    }

    /**
     * @group PatientDentalHistoryAttribute
     *
     * @method GET
     *
     * List all patientdentalhistoryattribute
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
     *                     "AttributeID": "Example value",
     *                     "AttributeValue": "Example value",
     *                     "AttributeText": "Example value",
     *                     "LastUpdatedBy": "Example value",
     *                     "LastUpdatedOn": "Example value"
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
            $data = $this->historyService->getAttributes($patient, $perPage);

            return $this->successResponse([
                'attributes' => PatientDentalHistoryAttributeResource::collection($data['attributes']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Dental History Attributes: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientDentalHistoryAttribute
     *
     * @method POST
     *
     * Create a new patientdentalhistoryattribute
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DentalHistoryAttributesCategory string required. Example: "Example DentalHistoryAttributesCategory"
     * @bodyParam DentalHistoryAttributeID string required. Maximum length: 255. Example: "Example DentalHistoryAttributeID"
     * @bodyParam DentalHistoryAttributeValue string required. Example: "Example DentalHistoryAttributeValue"
     * @bodyParam DentalHistoryAttributeText string required. Example: "Example DentalHistoryAttributeText"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "attribute": {
     *                 "ID": "Example value",
     *                 "Category": "Example value",
     *                 "AttributeID": "Example value",
     *                 "AttributeValue": "Example value",
     *                 "AttributeText": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDentalHistoryAttributeResource
     */
    public function store(StorePatientDentalHistoryAttributeRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $attribute = $this->historyService->createHistoryAttribute($validatedData);

            return $this->successResponse([
                'message' => 'Patient dental history attribute created successfully',
                'attribute' => new PatientDentalHistoryAttributeResource($attribute)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient dental history attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient dental history attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDentalHistoryAttribute
     *
     * @method PUT
     *
     * Update an existing patientdentalhistoryattribute
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdentalhistoryattribute to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DentalHistoryAttributesCategory string optional. Example: "Example DentalHistoryAttributesCategory"
     * @bodyParam DentalHistoryAttributeID string optional. Maximum length: 255. Example: "Example DentalHistoryAttributeID"
     * @bodyParam DentalHistoryAttributeValue string optional. Example: "Example DentalHistoryAttributeValue"
     * @bodyParam DentalHistoryAttributeText string optional. Example: "Example DentalHistoryAttributeText"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "attribute": {
     *                 "ID": "Example value",
     *                 "Category": "Example value",
     *                 "AttributeID": "Example value",
     *                 "AttributeValue": "Example value",
     *                 "AttributeText": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDentalHistoryAttributeResource
     */
    public function update(UpdatePatientDentalHistoryAttributeRequest $request, PatientDentalHistoryAttribute $patientDentalHistoryAttribute)
    {
        try {
            $validatedData = $request->validated();

            $updatedAttribute = $this->historyService->updateHistoryAttribute($patientDentalHistoryAttribute, $validatedData);

            return $this->successResponse([
                'message' => 'Patient dental history attribute updated successfully',
                'attribute' => new PatientDentalHistoryAttributeResource($updatedAttribute)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient dental history attribute: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient dental history attribute',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
