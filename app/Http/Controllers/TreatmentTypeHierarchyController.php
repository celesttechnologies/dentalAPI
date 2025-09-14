<?php

namespace App\Http\Controllers;

use App\Models\TreatmentTypeHierarchy;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\TreatmentTypeHierarchyService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\TreatmentTypeHierarchyResource;
use App\Http\Requests\StoreTreatmentTypeHierarchyRequest;
use App\Http\Requests\UpdateTreatmentTypeHierarchyRequest;

class TreatmentTypeHierarchyController extends Controller
{
    use ApiResponse;

    public function __construct(private TreatmentTypeHierarchyService $hierarchyService)
    {
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method GET
     *
     * List all treatmenttypehierarchy
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "providers": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "parent_treatment_type_id": 1,
     *                     "is_deleted": true,
     *                     "general_treatment_cost": "Example value",
     *                     "specialist_treatment_cost": "Example value",
     *                     "treatment_speciality_type_id": 1
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
    public function index(Request $request, $parentId = null)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));

            $treatmentTypeHierarchyList = $this->hierarchyService->getTreatmentTypeHierarchy($perPage, $parentId);

            return $this->successResponse(['providers' => TreatmentTypeHierarchyResource::collection($treatmentTypeHierarchyList['treatmentTypeHierarchy']), 'pagination' => $treatmentTypeHierarchyList['pagination']]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method GET
     *
     * Create treatmenttypehierarchy
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "general_treatment_cost": "Example value",
     *                 "specialist_treatment_cost": "Example value",
     *                 "treatment_speciality_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentTypeHierarchyResource
     */
    public function create()
    {
        //
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method POST
     *
     * Create a new treatmenttypehierarchy
     *
     * @post /
     *
     * @bodyParam TreatmentTypeID string required. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string required. Maximum length: 255. Example: "Example Title"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam ParentTreatmentTypeID string optional. nullable. Maximum length: 255. Example: "Example ParentTreatmentTypeID"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string required. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam GeneralTreatmentCost number optional. nullable. numeric. Example: 1
     * @bodyParam SpecialistTreatmentCost number optional. nullable. numeric. Example: 1
     * @bodyParam TreatmentSpecialityTypeID number optional. nullable. integer. Example: 1
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "general_treatment_cost": "Example value",
     *                 "specialist_treatment_cost": "Example value",
     *                 "treatment_speciality_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentTypeHierarchyResource
     */
    public function store(StoreTreatmentTypeHierarchyRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $hierarchy = $this->hierarchyService->createHierarchy($validatedData);

            return $this->successResponse([
                'message' => 'Treatment type hierarchy created successfully',
                'hierarchy' => new TreatmentTypeHierarchyResource($hierarchy)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating treatment type hierarchy: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create treatment type hierarchy',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method GET
     *
     * Get a specific treatmenttypehierarchy
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the treatmenttypehierarchy to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "general_treatment_cost": "Example value",
     *                 "specialist_treatment_cost": "Example value",
     *                 "treatment_speciality_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentTypeHierarchyResource
     */
    public function show(TreatmentTypeHierarchy $treatmentTypeHierarchy)
    {
        //
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method GET
     *
     * Edit treatmenttypehierarchy
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the treatmenttypehierarchy to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "general_treatment_cost": "Example value",
     *                 "specialist_treatment_cost": "Example value",
     *                 "treatment_speciality_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentTypeHierarchyResource
     */
    public function edit(TreatmentTypeHierarchy $treatmentTypeHierarchy)
    {
        //
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method PUT
     *
     * Update an existing treatmenttypehierarchy
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the treatmenttypehierarchy to update. Example: 1
     *
     * @bodyParam TreatmentTypeID string optional. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string optional. Maximum length: 255. Example: "Example Title"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam ParentTreatmentTypeID string optional. nullable. Maximum length: 255. Example: "Example ParentTreatmentTypeID"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam GeneralTreatmentCost number optional. nullable. numeric. Example: 1
     * @bodyParam SpecialistTreatmentCost number optional. nullable. numeric. Example: 1
     * @bodyParam TreatmentSpecialityTypeID number optional. nullable. integer. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "general_treatment_cost": "Example value",
     *                 "specialist_treatment_cost": "Example value",
     *                 "treatment_speciality_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return TreatmentTypeHierarchyResource
     */
    public function update(UpdateTreatmentTypeHierarchyRequest $request, TreatmentTypeHierarchy $treatmentTypeHierarchy)
    {
        try {
            $validatedData = $request->validated();

            $updatedHierarchy = $this->hierarchyService->updateHierarchy($treatmentTypeHierarchy, $validatedData);

            return $this->successResponse([
                'message' => 'Treatment type hierarchy updated successfully',
                'hierarchy' => new TreatmentTypeHierarchyResource($updatedHierarchy)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating treatment type hierarchy: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update treatment type hierarchy',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group TreatmentTypeHierarchy
     *
     * @method DELETE
     *
     * Delete a treatmenttypehierarchy
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the treatmenttypehierarchy to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreatmentTypeHierarchy $treatmentTypeHierarchy)
    {
        //
    }
}
