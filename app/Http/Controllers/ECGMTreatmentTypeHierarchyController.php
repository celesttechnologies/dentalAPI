<?php

namespace App\Http\Controllers;

use App\Models\ECGMTreatmentTypeHierarchy;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGMTreatmentTypeHierarchyService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGMTreatmentTypeHierarchyResource;
use App\Http\Requests\StoreECGMTreatmentTypeHierarchyRequest;
use App\Http\Requests\UpdateECGMTreatmentTypeHierarchyRequest;

class ECGMTreatmentTypeHierarchyController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGMTreatmentTypeHierarchyService $hierarchyService)
    {
    }

    /**
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method GET
     *
     * List all ecgmtreatmenttypehierarchy
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_types": [
     *                 {
     *                     "treatment_type_id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "parent_treatment_type_id": 1,
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "row_guid": 1,
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
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));

            $data = $this->hierarchyService->getTreatmentTypes($perPage);

            return $this->successResponse([
                'treatment_types' => ECGMTreatmentTypeHierarchyResource::collection($data['treatment_types']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECGM treatment types: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method GET
     *
     * Create ecgmtreatmenttypehierarchy
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "treatment_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
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
     * @return ECGMTreatmentTypeHierarchyResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method POST
     *
     * Create a new ecgmtreatmenttypehierarchy
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
     *                 "treatment_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
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
     * @return ECGMTreatmentTypeHierarchyResource
     */
    public function store(StoreECGMTreatmentTypeHierarchyRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $hierarchy = $this->hierarchyService->createHierarchy($validatedData);

            return $this->successResponse([
                'message' => 'Treatment type hierarchy created successfully',
                'hierarchy' => new ECGMTreatmentTypeHierarchyResource($hierarchy)
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
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method GET
     *
     * Get a specific ecgmtreatmenttypehierarchy
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgmtreatmenttypehierarchy to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "treatment_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
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
     * @return ECGMTreatmentTypeHierarchyResource
     */
    public function show(ECGMTreatmentTypeHierarchy $eCGMTreatmentTypeHierarchy)
    {
        //
    }

    /**
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method GET
     *
     * Edit ecgmtreatmenttypehierarchy
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgmtreatmenttypehierarchy to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "treatment_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
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
     * @return ECGMTreatmentTypeHierarchyResource
     */
    public function edit(ECGMTreatmentTypeHierarchy $eCGMTreatmentTypeHierarchy)
    {
        //
    }

    /**
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method PUT
     *
     * Update an existing ecgmtreatmenttypehierarchy
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgmtreatmenttypehierarchy to update. Example: 1
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
     *                 "treatment_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_treatment_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1,
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
     * @return ECGMTreatmentTypeHierarchyResource
     */
    public function update(UpdateECGMTreatmentTypeHierarchyRequest $request, ECGMTreatmentTypeHierarchy $eCGMTreatmentTypeHierarchy)
    {
        try {
            $validatedData = $request->validated();

            $updatedHierarchy = $this->hierarchyService->updateHierarchy($eCGMTreatmentTypeHierarchy, $validatedData);

            return $this->successResponse([
                'message' => 'Treatment type hierarchy updated successfully',
                'hierarchy' => new ECGMTreatmentTypeHierarchyResource($updatedHierarchy)
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
     * @group ECGMTreatmentTypeHierarchy
     *
     * @method DELETE
     *
     * Delete a ecgmtreatmenttypehierarchy
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgmtreatmenttypehierarchy to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGMTreatmentTypeHierarchy $eCGMTreatmentTypeHierarchy)
    {
        //
    }
}
