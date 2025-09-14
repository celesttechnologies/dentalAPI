<?php

namespace App\Http\Controllers;

use App\Models\EcgDoctorIncentive;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EcgDoctorIncentiveService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EcgDoctorIncentiveResource;
use App\Http\Requests\StoreEcgDoctorIncentiveRequest;
use App\Http\Requests\UpdateEcgDoctorIncentiveRequest;

class EcgDoctorIncentiveController extends Controller
{
    use ApiResponse;

    public function __construct(private EcgDoctorIncentiveService $incentiveService)
    {
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method GET
     *
     * List all ecgdoctorincentive
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_incentives": [
     *                 {
     *                     "incentive_id": 1,
     *                     "clinic_id": 1,
     *                     "provider_id": 1,
     *                     "month": "Example value",
     *                     "year": "Example value",
     *                     "total_incentive_amount": "Example value",
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

            $data = $this->incentiveService->getDoctorIncentives($perPage);

            return $this->successResponse([
                'doctor_incentives' => EcgDoctorIncentiveResource::collection($data['doctor_incentives']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG doctor incentives: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method GET
     *
     * Create ecgdoctorincentive
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentive": {
     *                 "incentive_id": 1,
     *                 "clinic_id": 1,
     *                 "provider_id": 1,
     *                 "month": "Example value",
     *                 "year": "Example value",
     *                 "total_incentive_amount": "Example value",
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
     * @return EcgDoctorIncentiveResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method POST
     *
     * Create a new ecgdoctorincentive
     *
     * @post /
     *
     * @bodyParam ClinicId string required. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam ProviderId string required. Maximum length: 255. Example: "1"
     * @bodyParam Month string required. Example: "Example Month"
     * @bodyParam Year string required. Example: "Example Year"
     * @bodyParam TotalIncentiveAmount number required. numeric. Example: 1
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "incentive": {
     *                 "incentive_id": 1,
     *                 "clinic_id": 1,
     *                 "provider_id": 1,
     *                 "month": "Example value",
     *                 "year": "Example value",
     *                 "total_incentive_amount": "Example value",
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
     * @return EcgDoctorIncentiveResource
     */
    public function store(StoreEcgDoctorIncentiveRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $incentive = $this->incentiveService->createIncentive($validatedData);

            return $this->successResponse([
                'message' => 'Doctor incentive created successfully',
                'incentive' => new EcgDoctorIncentiveResource($incentive)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating doctor incentive: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create doctor incentive',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method GET
     *
     * Get a specific ecgdoctorincentive
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentive to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentive": {
     *                 "incentive_id": 1,
     *                 "clinic_id": 1,
     *                 "provider_id": 1,
     *                 "month": "Example value",
     *                 "year": "Example value",
     *                 "total_incentive_amount": "Example value",
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
     * @return EcgDoctorIncentiveResource
     */
    public function show(EcgDoctorIncentive $ecgDoctorIncentive)
    {
        //
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method GET
     *
     * Edit ecgdoctorincentive
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentive to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentive": {
     *                 "incentive_id": 1,
     *                 "clinic_id": 1,
     *                 "provider_id": 1,
     *                 "month": "Example value",
     *                 "year": "Example value",
     *                 "total_incentive_amount": "Example value",
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
     * @return EcgDoctorIncentiveResource
     */
    public function edit(EcgDoctorIncentive $ecgDoctorIncentive)
    {
        //
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method PUT
     *
     * Update an existing ecgdoctorincentive
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentive to update. Example: 1
     *
     * @bodyParam ClinicId string optional. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam ProviderId string optional. Maximum length: 255. Example: "1"
     * @bodyParam Month string optional. Example: "Example Month"
     * @bodyParam Year string optional. Example: "Example Year"
     * @bodyParam TotalIncentiveAmount number optional. numeric. Example: 1
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentive": {
     *                 "incentive_id": 1,
     *                 "clinic_id": 1,
     *                 "provider_id": 1,
     *                 "month": "Example value",
     *                 "year": "Example value",
     *                 "total_incentive_amount": "Example value",
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
     * @return EcgDoctorIncentiveResource
     */
    public function update(UpdateEcgDoctorIncentiveRequest $request, EcgDoctorIncentive $ecgDoctorIncentive)
    {
        try {
            $validatedData = $request->validated();

            $updatedIncentive = $this->incentiveService->updateIncentive($ecgDoctorIncentive, $validatedData);

            return $this->successResponse([
                'message' => 'Doctor incentive updated successfully',
                'incentive' => new EcgDoctorIncentiveResource($updatedIncentive)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating doctor incentive: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update doctor incentive',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgDoctorIncentive
     *
     * @method DELETE
     *
     * Delete a ecgdoctorincentive
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentive to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcgDoctorIncentive $ecgDoctorIncentive)
    {
        //
    }
}
