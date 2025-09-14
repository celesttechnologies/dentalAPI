<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Services\DrugService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Http\Resources\DrugResource;
use Illuminate\Support\Facades\Log;

class DrugController extends Controller
{
    use ApiResponse;
    public function __construct(
        private DrugService $drugService
    ) {

    }

    /**
     * @group Drug
     *
     * @method GET
     *
     * List all drug
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "drugs": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "generic_name": "Example Name",
     *                     "contraindications": "Example value",
     *                     "interactions": "Example value",
     *                     "adverse_effects": "Example value",
     *                     "overdoze_management": "Example value",
     *                     "precautions": "Example value",
     *                     "patient_alerts": "Example value",
     *                     "other_info": "Example value",
     *                     "is_deleted": true
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

            $drugList = $this->drugService->getDrugs($perPage);

            return $this->successResponse(['drugs' => DrugResource::collection($drugList['drugs']), 'pagination' => $drugList['pagination']]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group Drug
     *
     * @method GET
     *
     * Create drug
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "drug": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "generic_name": "Example Name",
     *                 "contraindications": "Example value",
     *                 "interactions": "Example value",
     *                 "adverse_effects": "Example value",
     *                 "overdoze_management": "Example value",
     *                 "precautions": "Example value",
     *                 "patient_alerts": "Example value",
     *                 "other_info": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DrugResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Drug
     *
     * @method POST
     *
     * Create a new drug
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam GenericName string required. Example: "Example GenericName"
     * @bodyParam Contraindications string required. Example: "Example Contraindications"
     * @bodyParam Interactions string required. Example: "Example Interactions"
     * @bodyParam AdverseEffects string required. Example: "Example AdverseEffects"
     * @bodyParam OverdozeManagement string required. Example: "Example OverdozeManagement"
     * @bodyParam Precautions string required. Example: "Example Precautions"
     * @bodyParam PatientAlerts string required. Example: "Example PatientAlerts"
     * @bodyParam OtherInfo string required. Example: "Example OtherInfo"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "drug": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "generic_name": "Example Name",
     *                 "contraindications": "Example value",
     *                 "interactions": "Example value",
     *                 "adverse_effects": "Example value",
     *                 "overdoze_management": "Example value",
     *                 "precautions": "Example value",
     *                 "patient_alerts": "Example value",
     *                 "other_info": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DrugResource
     */
    public function store(StoreDrugRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $drug = $this->drugService->createDrug($validatedData);

            return $this->successResponse([
                'message' => 'Drug created successfully',
                'drug' => new DrugResource($drug)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating drug: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create drug',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Drug
     *
     * @method GET
     *
     * Get a specific drug
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the drug to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "drug": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "generic_name": "Example Name",
     *                 "contraindications": "Example value",
     *                 "interactions": "Example value",
     *                 "adverse_effects": "Example value",
     *                 "overdoze_management": "Example value",
     *                 "precautions": "Example value",
     *                 "patient_alerts": "Example value",
     *                 "other_info": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DrugResource
     */
    public function show(Drug $drug)
    {
        //
    }

    /**
     * @group Drug
     *
     * @method GET
     *
     * Edit drug
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the drug to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "drug": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "generic_name": "Example Name",
     *                 "contraindications": "Example value",
     *                 "interactions": "Example value",
     *                 "adverse_effects": "Example value",
     *                 "overdoze_management": "Example value",
     *                 "precautions": "Example value",
     *                 "patient_alerts": "Example value",
     *                 "other_info": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DrugResource
     */
    public function edit(Drug $drug)
    {
        //
    }

    /**
     * @group Drug
     *
     * @method PUT
     *
     * Update an existing drug
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the drug to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam GenericName string optional. Example: "Example GenericName"
     * @bodyParam Contraindications string optional. Example: "Example Contraindications"
     * @bodyParam Interactions string optional. Example: "Example Interactions"
     * @bodyParam AdverseEffects string optional. Example: "Example AdverseEffects"
     * @bodyParam OverdozeManagement string optional. Example: "Example OverdozeManagement"
     * @bodyParam Precautions string optional. Example: "Example Precautions"
     * @bodyParam PatientAlerts string optional. Example: "Example PatientAlerts"
     * @bodyParam OtherInfo string optional. Example: "Example OtherInfo"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "drug": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "generic_name": "Example Name",
     *                 "contraindications": "Example value",
     *                 "interactions": "Example value",
     *                 "adverse_effects": "Example value",
     *                 "overdoze_management": "Example value",
     *                 "precautions": "Example value",
     *                 "patient_alerts": "Example value",
     *                 "other_info": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DrugResource
     */
    public function update(UpdateDrugRequest $request, Drug $drug)
    {
        try {
            $validatedData = $request->validated();

            $updatedDrug = $this->drugService->updateDrug($drug, $validatedData);

            return $this->successResponse([
                'message' => 'Drug updated successfully',
                'drug' => new DrugResource($updatedDrug)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating drug: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update drug',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Drug
     *
     * @method DELETE
     *
     * Delete a drug
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the drug to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        //
    }
}
