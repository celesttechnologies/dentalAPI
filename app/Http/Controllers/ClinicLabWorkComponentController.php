<?php

namespace App\Http\Controllers;

use App\Models\ClinicLabWorkComponent;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicLabWorkComponentService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicLabWorkComponentResource;
use App\Http\Requests\StoreClinicLabWorkComponentRequest;
use App\Http\Requests\UpdateClinicLabWorkComponentRequest;

class ClinicLabWorkComponentController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicLabWorkComponentService $clinicLabWorkComponentService)
    {
    }

    /**
     * @group ClinicLabWorkComponent
     *
     * @method GET
     *
     * List all cliniclabworkcomponent
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_lab_work_components": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "component_name": "Example Name",
     *                     "component_description": "Example value",
     *                     "lab_work_cost": "Example value",
     *                     "component_category_id": 1,
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

            $data = $this->clinicLabWorkComponentService->getClinicLabWorkComponents($perPage);

            return $this->successResponse([
                'clinic_lab_work_components' => ClinicLabWorkComponentResource::collection($data['clinic_lab_work_components']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic lab work components: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }



    /**
     * @group ClinicLabWorkComponent
     *
     * @method GET
     *
     * Create cliniclabworkcomponent
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "component": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "component_name": "Example Name",
     *                 "component_description": "Example value",
     *                 "lab_work_cost": "Example value",
     *                 "component_category_id": 1,
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
     * @return ClinicLabWorkComponentResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicLabWorkComponent
     *
     * @method POST
     *
     * Create a new cliniclabworkcomponent
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ComponentName string required. Example: "Example ComponentName"
     * @bodyParam ComponentDescription string required. Example: "Example ComponentDescription"
     * @bodyParam LabWorkCost number required. numeric. Example: 1
     * @bodyParam ComponentCategoryID string required. Maximum length: 255. Example: "Example ComponentCategoryID"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "component": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "component_name": "Example Name",
     *                 "component_description": "Example value",
     *                 "lab_work_cost": "Example value",
     *                 "component_category_id": 1,
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
     * @return ClinicLabWorkComponentResource
     */
    public function store(StoreClinicLabWorkComponentRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $component = $this->clinicLabWorkComponentService->createLabWorkComponent($validatedData);

            return $this->successResponse([
                'message' => 'Lab work component created successfully',
                'component' => new ClinicLabWorkComponentResource($component)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating lab work component: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create lab work component',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabWorkComponent
     *
     * @method GET
     *
     * Get a specific cliniclabworkcomponent
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabworkcomponent to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "component": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "component_name": "Example Name",
     *                 "component_description": "Example value",
     *                 "lab_work_cost": "Example value",
     *                 "component_category_id": 1,
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
     * @return ClinicLabWorkComponentResource
     */
    public function show(ClinicLabWorkComponent $clinicLabWorkComponent)
    {
        //
    }

    /**
     * @group ClinicLabWorkComponent
     *
     * @method GET
     *
     * Edit cliniclabworkcomponent
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cliniclabworkcomponent to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "component": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "component_name": "Example Name",
     *                 "component_description": "Example value",
     *                 "lab_work_cost": "Example value",
     *                 "component_category_id": 1,
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
     * @return ClinicLabWorkComponentResource
     */
    public function edit(ClinicLabWorkComponent $clinicLabWorkComponent)
    {
        //
    }

    /**
     * @group ClinicLabWorkComponent
     *
     * @method PUT
     *
     * Update an existing cliniclabworkcomponent
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabworkcomponent to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ComponentName string optional. Example: "Example ComponentName"
     * @bodyParam ComponentDescription string optional. Example: "Example ComponentDescription"
     * @bodyParam LabWorkCost number optional. numeric. Example: 1
     * @bodyParam ComponentCategoryID string optional. Maximum length: 255. Example: "Example ComponentCategoryID"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "component": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "component_name": "Example Name",
     *                 "component_description": "Example value",
     *                 "lab_work_cost": "Example value",
     *                 "component_category_id": 1,
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
     * @return ClinicLabWorkComponentResource
     */
    public function update(UpdateClinicLabWorkComponentRequest $request, ClinicLabWorkComponent $clinicLabWorkComponent)
    {
        try {
            $validatedData = $request->validated();

            $updatedComponent = $this->clinicLabWorkComponentService->updateLabWorkComponent($clinicLabWorkComponent, $validatedData);

            return $this->successResponse([
                'message' => 'Lab work component updated successfully',
                'component' => new ClinicLabWorkComponentResource($updatedComponent)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lab work component: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lab work component',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabWorkComponent
     *
     * @method DELETE
     *
     * Delete a cliniclabworkcomponent
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabworkcomponent to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicLabWorkComponent $clinicLabWorkComponent)
    {
        //
    }
}
