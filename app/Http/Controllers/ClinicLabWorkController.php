<?php

namespace App\Http\Controllers;

use App\Models\ClinicLabWork;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClinicLabWorkRequest;
use App\Http\Requests\UpdateClinicLabWorkRequest;
use App\Http\Resources\ClinicLabWorkResource;
use App\Models\Patient;
use App\Services\ClinicLabWorkService;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;

class ClinicLabWorkController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicLabWorkService $clinicLabWorkService)
    {
    }

    /**
     * @group ClinicLabWork
     *
     * @method GET
     *
     * List all cliniclabwork
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_works": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "appointment_id": 1,
     *                     "lab_id": 1,
     *                     "lab_work_type": "Example value",
     *                     "status": "Example value",
     *                     "sent_date": "Example value",
     *                     "expected_date": "Example value",
     *                     "received_date": "Example value",
     *                     "notes": "Example value",
     *                     "created_at": "2025-05-19 04:57:26",
     *                     "updated_at": "2025-05-19 04:57:26"
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
    public function index(Request $request, $patientId = null)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->clinicLabWorkService->getLabWorks($perPage, $patientId);

            return $this->successResponse([
                'lab_works' => ClinicLabWorkResource::collection($data['lab_works']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching lab works: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @group ClinicLabWork
     *
     * @method GET
     *
     * Create cliniclabwork
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "appointment_id": 1,
     *                 "lab_id": 1,
     *                 "lab_work_type": "Example value",
     *                 "status": "Example value",
     *                 "sent_date": "Example value",
     *                 "expected_date": "Example value",
     *                 "received_date": "Example value",
     *                 "notes": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicLabWork
     *
     * @method POST
     *
     * Create a new cliniclabwork
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam OrderNo string required. Example: "Example OrderNo"
     * @bodyParam OrderNumber string required. Example: "Example OrderNumber"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam LabWorkDate string required. date. Example: "Example LabWorkDate"
     * @bodyParam LabSupplierID string required. Maximum length: 255. Example: "Example LabSupplierID"
     * @bodyParam DeliveryDate string required. date. Example: "Example DeliveryDate"
     * @bodyParam OrderType string required. Example: "Example OrderType"
     * @bodyParam ParentLabWorkID string required. Maximum length: 255. Example: "Example ParentLabWorkID"
     * @bodyParam StageID string required. Maximum length: 255. Example: "Example StageID"
     * @bodyParam SentRecievedIDCSV string required. Maximum length: 255. Example: "Example SentRecievedIDCSV"
     * @bodyParam Shade string required. Example: "Example Shade"
     * @bodyParam SelectedTeeth string required. Example: "Example SelectedTeeth"
     * @bodyParam PonticDesignsIDCSV string required. Maximum length: 255. Example: "Example PonticDesignsIDCSV"
     * @bodyParam CollarMetalDesignsIDCSV string required. Maximum length: 255. Example: "Example CollarMetalDesignsIDCSV"
     * @bodyParam TotalCost number required. numeric. Example: 1
     * @bodyParam Instructions string required. Example: "Example Instructions"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam lastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LabStatus string required. Example: "Example LabStatus"
     * @bodyParam WarrantyDetails string required. Example: "Example WarrantyDetails"
     * @bodyParam LabInvoiceDate string required. date. Example: "Example LabInvoiceDate"
     * @bodyParam LabInvoiceNumber string required. Example: "Example LabInvoiceNumber"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "appointment_id": 1,
     *                 "lab_id": 1,
     *                 "lab_work_type": "Example value",
     *                 "status": "Example value",
     *                 "sent_date": "Example value",
     *                 "expected_date": "Example value",
     *                 "received_date": "Example value",
     *                 "notes": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkResource
     */
    public function store(StoreClinicLabWorkRequest $request, $patientId = null)
    {
        try {
            $validatedData = $request->validated();

            $labWork = $this->clinicLabWorkService->createLabWork($validatedData);

            return $this->successResponse([
                'message' => 'Lab work created successfully',
                'lab_work' => new ClinicLabWorkResource($labWork)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating lab work: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create lab work',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabWork
     *
     * @method GET
     *
     * Get a specific cliniclabwork
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabwork to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "appointment_id": 1,
     *                 "lab_id": 1,
     *                 "lab_work_type": "Example value",
     *                 "status": "Example value",
     *                 "sent_date": "Example value",
     *                 "expected_date": "Example value",
     *                 "received_date": "Example value",
     *                 "notes": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkResource
     */
    public function show(ClinicLabWork $clinicLabWork)
    {
        //
    }

    /**
     * @group ClinicLabWork
     *
     * @method GET
     *
     * Edit cliniclabwork
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cliniclabwork to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "appointment_id": 1,
     *                 "lab_id": 1,
     *                 "lab_work_type": "Example value",
     *                 "status": "Example value",
     *                 "sent_date": "Example value",
     *                 "expected_date": "Example value",
     *                 "received_date": "Example value",
     *                 "notes": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkResource
     */
    public function edit(ClinicLabWork $clinicLabWork)
    {
        //
    }

    /**
     * @group ClinicLabWork
     *
     * @method PUT
     *
     * Update an existing cliniclabwork
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabwork to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam OrderNo string optional. Example: "Example OrderNo"
     * @bodyParam OrderNumber string optional. Example: "Example OrderNumber"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam LabWorkDate string optional. date. Example: "Example LabWorkDate"
     * @bodyParam LabSupplierID string optional. Maximum length: 255. Example: "Example LabSupplierID"
     * @bodyParam DeliveryDate string optional. date. Example: "Example DeliveryDate"
     * @bodyParam OrderType string optional. Example: "Example OrderType"
     * @bodyParam ParentLabWorkID string optional. Maximum length: 255. Example: "Example ParentLabWorkID"
     * @bodyParam StageID string optional. Maximum length: 255. Example: "Example StageID"
     * @bodyParam SentRecievedIDCSV string optional. Maximum length: 255. Example: "Example SentRecievedIDCSV"
     * @bodyParam Shade string optional. Example: "Example Shade"
     * @bodyParam SelectedTeeth string optional. Example: "Example SelectedTeeth"
     * @bodyParam PonticDesignsIDCSV string optional. Maximum length: 255. Example: "Example PonticDesignsIDCSV"
     * @bodyParam CollarMetalDesignsIDCSV string optional. Maximum length: 255. Example: "Example CollarMetalDesignsIDCSV"
     * @bodyParam TotalCost number optional. numeric. Example: 1
     * @bodyParam Instructions string optional. Example: "Example Instructions"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam lastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LabStatus string optional. Example: "Example LabStatus"
     * @bodyParam WarrantyDetails string optional. Example: "Example WarrantyDetails"
     * @bodyParam LabInvoiceDate string optional. date. Example: "Example LabInvoiceDate"
     * @bodyParam LabInvoiceNumber string optional. Example: "Example LabInvoiceNumber"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "appointment_id": 1,
     *                 "lab_id": 1,
     *                 "lab_work_type": "Example value",
     *                 "status": "Example value",
     *                 "sent_date": "Example value",
     *                 "expected_date": "Example value",
     *                 "received_date": "Example value",
     *                 "notes": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkResource
     */
    public function update(UpdateClinicLabWorkRequest $request, $patientId = null, ClinicLabWork $clinicLabWork)
    {
        try {
            $validatedData = $request->validated();

            $updatedLabWork = $this->clinicLabWorkService->updateLabWork($clinicLabWork, $validatedData);

            return $this->successResponse([
                'message' => 'Lab work updated successfully',
                'lab_work' => new ClinicLabWorkResource($updatedLabWork)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lab work: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lab work',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabWork
     *
     * @method DELETE
     *
     * Delete a cliniclabwork
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabwork to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicLabWork $clinicLabWork)
    {
        //
    }
}
