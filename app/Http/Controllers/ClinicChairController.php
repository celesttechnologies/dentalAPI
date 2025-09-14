<?php

namespace App\Http\Controllers;

use App\Models\ClinicChair;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicChairService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicChairResource;
use App\Http\Requests\StoreClinicChairRequest;
use App\Http\Requests\UpdateClinicChairRequest;

class ClinicChairController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicChairService $clinicChairService)
    {
    }

    /**
     * @group ClinicChair
     *
     * @method GET
     *
     * List all clinicchair
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_chairs": [
     *                 {
     *                     "chair_id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "rowguid": 1
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

            $data = $this->clinicChairService->getClinicChairs($perPage);

            return $this->successResponse([
                'clinic_chairs' => ClinicChairResource::collection($data['clinic_chairs']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic chairs: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicChair
     *
     * @method GET
     *
     * Create clinicchair
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_chair": {
     *                 "chair_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicChairResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicChair
     *
     * @method POST
     *
     * Create a new clinicchair
     *
     * @post /
     *
     * @bodyParam ChairID string required. Maximum length: 255. Example: "Example ChairID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string required. Maximum length: 255. Example: "Example Title"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_chair": {
     *                 "chair_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicChairResource
     */
    public function store(StoreClinicChairRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $clinicChair = $this->clinicChairService->createClinicChair($validatedData);

            return $this->successResponse([
                'message' => 'Clinic chair created successfully',
                'clinic_chair' => new ClinicChairResource($clinicChair)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic chair: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic chair',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicChair
     *
     * @method GET
     *
     * Get a specific clinicchair
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinicchair to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_chair": {
     *                 "chair_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicChairResource
     */
    public function show(ClinicChair $clinicChair)
    {
        //
    }

    /**
     * @group ClinicChair
     *
     * @method GET
     *
     * Edit clinicchair
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinicchair to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_chair": {
     *                 "chair_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicChairResource
     */
    public function edit(ClinicChair $clinicChair)
    {
        //
    }

    /**
     * @group ClinicChair
     *
     * @method PUT
     *
     * Update an existing clinicchair
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinicchair to update. Example: 1
     *
     * @bodyParam ChairID string optional. Maximum length: 255. Example: "Example ChairID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string optional. Maximum length: 255. Example: "Example Title"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_chair": {
     *                 "chair_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicChairResource
     */
    public function update(UpdateClinicChairRequest $request, ClinicChair $clinicChair)
    {
        try {
            $validatedData = $request->validated();

            $updatedClinicChair = $this->clinicChairService->updateClinicChair($clinicChair, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic chair updated successfully',
                'clinic_chair' => new ClinicChairResource($updatedClinicChair)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic chair: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic chair',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicChair
     *
     * @method DELETE
     *
     * Delete a clinicchair
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinicchair to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicChair $clinicChair)
    {
        //
    }
}
