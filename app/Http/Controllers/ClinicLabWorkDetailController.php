<?php

namespace App\Http\Controllers;

use App\Models\ClinicLabWorkDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicLabWorkDetailService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicLabWorkDetailResource;
use App\Http\Requests\StoreClinicLabWorkDetailRequest;
use App\Http\Requests\UpdateClinicLabWorkDetailRequest;

class ClinicLabWorkDetailController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicLabWorkDetailService $clinicLabWorkDetailService)
    {
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method GET
     *
     * List all cliniclabworkdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_lab_work_details": [
     *                 {
     *                     "id": 1,
     *                     "lab_work_id": 1,
     *                     "lab_work_component_id": 1,
     *                     "selected_teeth": "Example value",
     *                     "lab_work_component_cost": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->clinicLabWorkDetailService->getClinicLabWorkDetails($perPage);

            return $this->successResponse([
                'clinic_lab_work_details' => ClinicLabWorkDetailResource::collection($data['clinic_lab_work_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic lab work details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method GET
     *
     * Create cliniclabworkdetail
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work_detail": {
     *                 "id": 1,
     *                 "lab_work_id": 1,
     *                 "lab_work_component_id": 1,
     *                 "selected_teeth": "Example value",
     *                 "lab_work_component_cost": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkDetailResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method POST
     *
     * Create a new cliniclabworkdetail
     *
     * @post /
     *
     * @bodyParam LabWorkID string required. Maximum length: 255. Example: "Example LabWorkID"
     * @bodyParam LabWorkComponentID string required. Maximum length: 255. Example: "Example LabWorkComponentID"
     * @bodyParam SelectedTeeth string required. Example: "Example SelectedTeeth"
     * @bodyParam LabWorkComponentCost number required. numeric. Example: 1
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam lastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work_detail": {
     *                 "id": 1,
     *                 "lab_work_id": 1,
     *                 "lab_work_component_id": 1,
     *                 "selected_teeth": "Example value",
     *                 "lab_work_component_cost": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkDetailResource
     */
    public function store(StoreClinicLabWorkDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $labWorkDetail = $this->clinicLabWorkDetailService->createLabWorkDetail($validatedData);

            return $this->successResponse([
                'message' => 'Lab work detail created successfully',
                'lab_work_detail' => new ClinicLabWorkDetailResource($labWorkDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating lab work detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create lab work detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method GET
     *
     * Get a specific cliniclabworkdetail
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabworkdetail to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work_detail": {
     *                 "id": 1,
     *                 "lab_work_id": 1,
     *                 "lab_work_component_id": 1,
     *                 "selected_teeth": "Example value",
     *                 "lab_work_component_cost": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkDetailResource
     */
    public function show(ClinicLabWorkDetail $clinicLabWorkDetail)
    {
        //
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method GET
     *
     * Edit cliniclabworkdetail
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cliniclabworkdetail to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work_detail": {
     *                 "id": 1,
     *                 "lab_work_id": 1,
     *                 "lab_work_component_id": 1,
     *                 "selected_teeth": "Example value",
     *                 "lab_work_component_cost": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkDetailResource
     */
    public function edit(ClinicLabWorkDetail $clinicLabWorkDetail)
    {
        //
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method PUT
     *
     * Update an existing cliniclabworkdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabworkdetail to update. Example: 1
     *
     * @bodyParam LabWorkID string optional. Maximum length: 255. Example: "Example LabWorkID"
     * @bodyParam LabWorkComponentID string optional. Maximum length: 255. Example: "Example LabWorkComponentID"
     * @bodyParam SelectedTeeth string optional. Example: "Example SelectedTeeth"
     * @bodyParam LabWorkComponentCost number optional. numeric. Example: 1
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam lastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_work_detail": {
     *                 "id": 1,
     *                 "lab_work_id": 1,
     *                 "lab_work_component_id": 1,
     *                 "selected_teeth": "Example value",
     *                 "lab_work_component_cost": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicLabWorkDetailResource
     */
    public function update(UpdateClinicLabWorkDetailRequest $request, ClinicLabWorkDetail $clinicLabWorkDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedLabWorkDetail = $this->clinicLabWorkDetailService->updateLabWorkDetail($clinicLabWorkDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Lab work detail updated successfully',
                'lab_work_detail' => new ClinicLabWorkDetailResource($updatedLabWorkDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lab work detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lab work detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabWorkDetail
     *
     * @method DELETE
     *
     * Delete a cliniclabworkdetail
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabworkdetail to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicLabWorkDetail $clinicLabWorkDetail)
    {
        //
    }
}
