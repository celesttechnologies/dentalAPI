<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\FamilyService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\FamilyResource;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;

class FamilyController extends Controller
{
    use ApiResponse;

    public function __construct(private FamilyService $familyService)
    {
    }

    /**
     * @group Family
     *
     * @method GET
     *
     * List all family
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "families": [
     *                 {
     *                     "id": 1,
     *                     "name": "Example Name",
     *                     "address": "Example value",
     *                     "phone": "Example value"
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
            $data = $this->familyService->getFamilies($perPage);

            return $this->successResponse([
                'families' => FamilyResource::collection($data['families']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Families: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group Family
     *
     * @method GET
     *
     * Create family
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "family": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "address": "Example value",
     *                 "phone": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FamilyResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Family
     *
     * @method POST
     *
     * Create a new family
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam FamilyName string required. Example: "Example FamilyName"
     * @bodyParam FamilyNotes string required. Example: "Example FamilyNotes"
     * @bodyParam AddressLine1 string required. Example: "Example AddressLine1"
     * @bodyParam AddressLine2 string required. Example: "Example AddressLine2"
     * @bodyParam Street string required. Example: "Example Street"
     * @bodyParam Area string required. Example: "Example Area"
     * @bodyParam City string required. Example: "Example City"
     * @bodyParam State string required. Example: "Example State"
     * @bodyParam Country string required. Example: "Example Country"
     * @bodyParam ZipCode string required. Example: "Example ZipCode"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam FamilyNo string required. Example: "Example FamilyNo"
     * @bodyParam FamilyCode string required. Example: "Example FamilyCode"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "family": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "address": "Example value",
     *                 "phone": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return FamilyResource
     */
    public function store(StoreFamilyRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $family = $this->familyService->createFamily($validatedData);

            return $this->successResponse([
                'message' => 'Family created successfully',
                'family' => new FamilyResource($family)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating family: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create family',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Family
     *
     * @method GET
     *
     * Get a specific family
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the family to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "family": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "address": "Example value",
     *                 "phone": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FamilyResource
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * @group Family
     *
     * @method GET
     *
     * Edit family
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the family to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "family": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "address": "Example value",
     *                 "phone": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FamilyResource
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * @group Family
     *
     * @method PUT
     *
     * Update an existing family
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the family to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam FamilyName string optional. Example: "Example FamilyName"
     * @bodyParam FamilyNotes string optional. Example: "Example FamilyNotes"
     * @bodyParam AddressLine1 string optional. Example: "Example AddressLine1"
     * @bodyParam AddressLine2 string optional. Example: "Example AddressLine2"
     * @bodyParam Street string optional. Example: "Example Street"
     * @bodyParam Area string optional. Example: "Example Area"
     * @bodyParam City string optional. Example: "Example City"
     * @bodyParam State string optional. Example: "Example State"
     * @bodyParam Country string optional. Example: "Example Country"
     * @bodyParam ZipCode string optional. Example: "Example ZipCode"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam FamilyNo string optional. Example: "Example FamilyNo"
     * @bodyParam FamilyCode string optional. Example: "Example FamilyCode"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "family": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "address": "Example value",
     *                 "phone": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return FamilyResource
     */
    public function update(UpdateFamilyRequest $request, Family $family)
    {
        try {
            $validatedData = $request->validated();

            $updatedFamily = $this->familyService->updateFamily($family, $validatedData);

            return $this->successResponse([
                'message' => 'Family updated successfully',
                'family' => new FamilyResource($updatedFamily)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating family: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update family',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Family
     *
     * @method DELETE
     *
     * Delete a family
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the family to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        //
    }
}
