<?php

namespace App\Http\Controllers;

use App\Models\PatientLabWork;
use App\Http\Resources\PatientLabWorkResource; // Assuming you have a resource for Patient Lab Work
use App\Services\PatientLabWorkService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientLabWorkRequest;
use App\Http\Requests\UpdatePatientLabWorkRequest;

/**
 * @group Patient
 * @subgroup Labwork
 * @subgroupDescription PatientLabWorkController handles the CRUD operations for patient lab work controller.
 */
class PatientLabWorkController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientLabWorkService $patientLabWorkService)
    {
    }

    /**
     * @group PatientLabWork
     *
     * @method GET
     *
     * List all patientlabwork
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_works": [
     *                 {
     *                     "patient_lab_work_id": 1,
     *                     "patient_lab_id": 1,
     *                     "work_pattern_dr": "Example value",
     *                     "work_pattern_tec": "Example value",
     *                     "work_pattern_date": "Example value",
     *                     "work_pattern_time": "Example value",
     *                     "metal_work_dr": "Example value",
     *                     "metal_work_tec": "Example value",
     *                     "metal_work_date": "Example value",
     *                     "metal_work_time": "Example value",
     *                     "ceramics_dr": "Example value",
     *                     "ceramics_tec": "Example value",
     *                     "ceramics_date": "Example value",
     *                     "ceramics_time": "Example value",
     *                     "denture_dr": "Example value",
     *                     "denture_tec": "Example value",
     *                     "denture_date": "Example value",
     *                     "denture_time": "Example value"
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
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientLabWorkService->getLabWorks($perPage);

            return $this->successResponse([
                'lab_works' => PatientLabWorkResource::collection($data['lab_works']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Lab Works: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
                'code' => $e
            ]);
        }
    }

    /**
     * @group PatientLabWork
     *
     * @method POST
     *
     * Create a new patientlabwork
     *
     * @post /
     *
     * @bodyParam PatientLabID string required. Maximum length: 255. Example: "Example PatientLabID"
     * @bodyParam WorkPatternDR string required. Example: "Example WorkPatternDR"
     * @bodyParam WorkPatternTec string required. Example: "Example WorkPatternTec"
     * @bodyParam WorkPatternDate string required. date. Example: "Example WorkPatternDate"
     * @bodyParam WorkPatternTime string required. Example: "Example WorkPatternTime"
     * @bodyParam MetalWorkDR string required. Example: "Example MetalWorkDR"
     * @bodyParam MetalWorkTec string required. Example: "Example MetalWorkTec"
     * @bodyParam MetalWorkDate string required. date. Example: "Example MetalWorkDate"
     * @bodyParam MetalWorkTime string required. Example: "Example MetalWorkTime"
     * @bodyParam CeramicsDR string required. Example: "Example CeramicsDR"
     * @bodyParam CeramicsTec string required. Example: "Example CeramicsTec"
     * @bodyParam CeramicsDate string required. date. Example: "Example CeramicsDate"
     * @bodyParam CeramicsTime string required. Example: "Example CeramicsTime"
     * @bodyParam DentureDR string required. Example: "Example DentureDR"
     * @bodyParam DentureTec string required. Example: "Example DentureTec"
     * @bodyParam DentureDate string required. date. Example: "Example DentureDate"
     * @bodyParam DentureTime string required. Example: "Example DentureTime"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "patient_lab_work_id": 1,
     *                 "patient_lab_id": 1,
     *                 "work_pattern_dr": "Example value",
     *                 "work_pattern_tec": "Example value",
     *                 "work_pattern_date": "Example value",
     *                 "work_pattern_time": "Example value",
     *                 "metal_work_dr": "Example value",
     *                 "metal_work_tec": "Example value",
     *                 "metal_work_date": "Example value",
     *                 "metal_work_time": "Example value",
     *                 "ceramics_dr": "Example value",
     *                 "ceramics_tec": "Example value",
     *                 "ceramics_date": "Example value",
     *                 "ceramics_time": "Example value",
     *                 "denture_dr": "Example value",
     *                 "denture_tec": "Example value",
     *                 "denture_date": "Example value",
     *                 "denture_time": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientLabWorkResource
     */
    public function store(StorePatientLabWorkRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $labWork = $this->patientLabWorkService->createLabWork($validatedData);

            return $this->successResponse([
                'message' => 'Lab work created successfully',
                'lab_work' => new PatientLabWorkResource($labWork)
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
     * @group PatientLabWork
     *
     * @method PUT
     *
     * Update an existing patientlabwork
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientlabwork to update. Example: 1
     *
     * @bodyParam PatientLabID string optional. Maximum length: 255. Example: "Example PatientLabID"
     * @bodyParam WorkPatternDR string optional. Example: "Example WorkPatternDR"
     * @bodyParam WorkPatternTec string optional. Example: "Example WorkPatternTec"
     * @bodyParam WorkPatternDate string optional. date. Example: "Example WorkPatternDate"
     * @bodyParam WorkPatternTime string optional. Example: "Example WorkPatternTime"
     * @bodyParam MetalWorkDR string optional. Example: "Example MetalWorkDR"
     * @bodyParam MetalWorkTec string optional. Example: "Example MetalWorkTec"
     * @bodyParam MetalWorkDate string optional. date. Example: "Example MetalWorkDate"
     * @bodyParam MetalWorkTime string optional. Example: "Example MetalWorkTime"
     * @bodyParam CeramicsDR string optional. Example: "Example CeramicsDR"
     * @bodyParam CeramicsTec string optional. Example: "Example CeramicsTec"
     * @bodyParam CeramicsDate string optional. date. Example: "Example CeramicsDate"
     * @bodyParam CeramicsTime string optional. Example: "Example CeramicsTime"
     * @bodyParam DentureDR string optional. Example: "Example DentureDR"
     * @bodyParam DentureTec string optional. Example: "Example DentureTec"
     * @bodyParam DentureDate string optional. date. Example: "Example DentureDate"
     * @bodyParam DentureTime string optional. Example: "Example DentureTime"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work": {
     *                 "patient_lab_work_id": 1,
     *                 "patient_lab_id": 1,
     *                 "work_pattern_dr": "Example value",
     *                 "work_pattern_tec": "Example value",
     *                 "work_pattern_date": "Example value",
     *                 "work_pattern_time": "Example value",
     *                 "metal_work_dr": "Example value",
     *                 "metal_work_tec": "Example value",
     *                 "metal_work_date": "Example value",
     *                 "metal_work_time": "Example value",
     *                 "ceramics_dr": "Example value",
     *                 "ceramics_tec": "Example value",
     *                 "ceramics_date": "Example value",
     *                 "ceramics_time": "Example value",
     *                 "denture_dr": "Example value",
     *                 "denture_tec": "Example value",
     *                 "denture_date": "Example value",
     *                 "denture_time": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientLabWorkResource
     */
    public function update(UpdatePatientLabWorkRequest $request, PatientLabWork $patientLabWork)
    {
        try {
            $validatedData = $request->validated();

            $updatedLabWork = $this->patientLabWorkService->updateLabWork($patientLabWork, $validatedData);

            return $this->successResponse([
                'message' => 'Lab work updated successfully',
                'lab_work' => new PatientLabWorkResource($updatedLabWork)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lab work: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lab work',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
