<?php

namespace App\Http\Controllers;

use App\Models\PatientLab;
use App\Http\Resources\PatientLabResource; // Assuming you have a resource for Patient Lab
use App\Services\PatientLabService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientLabRequest; // Assuming you have a request for storing Patient Lab
use App\Http\Requests\UpdatePatientLabRequest; // Assuming you have a request for updating Patient Lab
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Lab
 * @subgroupDescription PatientLabController handles the CRUD operations for patient lab controller.
 */
class PatientLabController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientLabService $patientLabService)
    {
    }

    /**
     * @group PatientLab
     *
     * @method GET
     *
     * List all patientlab
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "labs": [
     *                 {
     *                     "patient_lab_id": 1,
     *                     "patient_id": 1,
     *                     "provider_id": 1,
     *                     "date_of_lab_work": "Example value",
     *                     "time_of_lab_work": "Example value",
     *                     "work": "Example value",
     *                     "shade": "Example value",
     *                     "mt": "Example value",
     *                     "bisque": "Example value",
     *                     "finish": "Example value",
     *                     "denture": "Example value",
     *                     "del_date": "Example value",
     *                     "del_time": "Example value",
     *                     "rec_date": "Example value",
     *                     "remark": "Example value",
     *                     "rec_time": "Example value",
     *                     "lab_id": 1,
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "reference_no": "Example value",
     *                     "row_guid": 1
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
            $data = $this->patientLabService->getLabs($patient, $perPage);

            return $this->successResponse([
                'labs' => PatientLabResource::collection($data['labs']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Labs: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }

    /**
     * @group PatientLab
     *
     * @method POST
     *
     * Create a new patientlab
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam DateOfLabWork string required. date. Example: "Example DateOfLabWork"
     * @bodyParam TimeOfLabWork string required. Example: "Example TimeOfLabWork"
     * @bodyParam Work string required. Example: "Example Work"
     * @bodyParam Shade string required. Example: "Example Shade"
     * @bodyParam MT string required. Example: "Example MT"
     * @bodyParam Bisque string required. Example: "Example Bisque"
     * @bodyParam Finish string required. Example: "Example Finish"
     * @bodyParam Denture string required. Example: "Example Denture"
     * @bodyParam DelDate string required. date. Example: "Example DelDate"
     * @bodyParam DelTime string required. Example: "Example DelTime"
     * @bodyParam RecDate string required. date. Example: "Example RecDate"
     * @bodyParam Remark string required. Example: "Example Remark"
     * @bodyParam RecTime string required. Example: "Example RecTime"
     * @bodyParam LabID string required. Maximum length: 255. Example: "Example LabID"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam ReferenceNo string required. Example: "Example ReferenceNo"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lab": {
     *                 "patient_lab_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "date_of_lab_work": "Example value",
     *                 "time_of_lab_work": "Example value",
     *                 "work": "Example value",
     *                 "shade": "Example value",
     *                 "mt": "Example value",
     *                 "bisque": "Example value",
     *                 "finish": "Example value",
     *                 "denture": "Example value",
     *                 "del_date": "Example value",
     *                 "del_time": "Example value",
     *                 "rec_date": "Example value",
     *                 "remark": "Example value",
     *                 "rec_time": "Example value",
     *                 "lab_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "reference_no": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientLabResource
     */
    public function store(StorePatientLabRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $lab = $this->patientLabService->createLab($validatedData);

            return $this->successResponse([
                'message' => 'Lab record created successfully',
                'lab' => new PatientLabResource($lab)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating lab record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create lab record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientLab
     *
     * @method PUT
     *
     * Update an existing patientlab
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientlab to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam DateOfLabWork string optional. date. Example: "Example DateOfLabWork"
     * @bodyParam TimeOfLabWork string optional. Example: "Example TimeOfLabWork"
     * @bodyParam Work string optional. Example: "Example Work"
     * @bodyParam Shade string optional. Example: "Example Shade"
     * @bodyParam MT string optional. Example: "Example MT"
     * @bodyParam Bisque string optional. Example: "Example Bisque"
     * @bodyParam Finish string optional. Example: "Example Finish"
     * @bodyParam Denture string optional. Example: "Example Denture"
     * @bodyParam DelDate string optional. date. Example: "Example DelDate"
     * @bodyParam DelTime string optional. Example: "Example DelTime"
     * @bodyParam RecDate string optional. date. Example: "Example RecDate"
     * @bodyParam Remark string optional. Example: "Example Remark"
     * @bodyParam RecTime string optional. Example: "Example RecTime"
     * @bodyParam LabID string optional. Maximum length: 255. Example: "Example LabID"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam ReferenceNo string optional. Example: "Example ReferenceNo"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab": {
     *                 "patient_lab_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "date_of_lab_work": "Example value",
     *                 "time_of_lab_work": "Example value",
     *                 "work": "Example value",
     *                 "shade": "Example value",
     *                 "mt": "Example value",
     *                 "bisque": "Example value",
     *                 "finish": "Example value",
     *                 "denture": "Example value",
     *                 "del_date": "Example value",
     *                 "del_time": "Example value",
     *                 "rec_date": "Example value",
     *                 "remark": "Example value",
     *                 "rec_time": "Example value",
     *                 "lab_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "reference_no": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientLabResource
     */
    public function update(UpdatePatientLabRequest $request, PatientLab $patientLab)
    {
        try {
            $validatedData = $request->validated();

            $updatedLab = $this->patientLabService->updateLab($patientLab, $validatedData);

            return $this->successResponse([
                'message' => 'Lab record updated successfully',
                'lab' => new PatientLabResource($updatedLab)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lab record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lab record',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
