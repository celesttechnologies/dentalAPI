<?php

namespace App\Http\Controllers;

use App\Models\EcgDoctorIncentiveDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EcgDoctorIncentiveDetailService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EcgDoctorIncentiveDetailResource;
use App\Http\Requests\StoreEcgDoctorIncentiveDetailRequest;
use App\Http\Requests\UpdateEcgDoctorIncentiveDetailRequest;

class EcgDoctorIncentiveDetailController extends Controller
{
    use ApiResponse;

    public function __construct(private EcgDoctorIncentiveDetailService $incentiveDetailService)
    {
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method GET
     *
     * List all ecgdoctorincentivedetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doctor_incentive_details": [
     *                 {
     *                     "incentive_detail_id": 1,
     *                     "incentive_id": 1,
     *                     "patient_treatment_done_id": 1,
     *                     "treatment_total_cost": "Example value",
     *                     "incentive_amount": "Example value",
     *                     "incentive_type": "Example value",
     *                     "incentive_value": "Example value",
     *                     "is_deleted": true,
     *                     "added_by": "Example value",
     *                     "added_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value"
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

            $data = $this->incentiveDetailService->getDoctorIncentiveDetails($perPage);

            return $this->successResponse([
                'doctor_incentive_details' => EcgDoctorIncentiveDetailResource::collection($data['doctor_incentive_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG doctor incentive details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method GET
     *
     * Create ecgdoctorincentivedetail
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentiveDetail": {
     *                 "incentive_detail_id": 1,
     *                 "incentive_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_total_cost": "Example value",
     *                 "incentive_amount": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "is_deleted": true,
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgDoctorIncentiveDetailResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method POST
     *
     * Create a new ecgdoctorincentivedetail
     *
     * @post /
     *
     * @bodyParam IncetiveId string required. Maximum length: 255. Example: "Example IncetiveId"
     * @bodyParam PatientTreatmentDoneID string required. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam TreatmentTotalCost number required. numeric. Example: 1
     * @bodyParam IncentiveAmount number required. numeric. Example: 1
     * @bodyParam IncentiveType string required. Example: "Example IncentiveType"
     * @bodyParam IncentiveValue string required. Example: "Example IncentiveValue"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam AddedBy string required. Example: "Example AddedBy"
     * @bodyParam AddedOn string required. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "incentiveDetail": {
     *                 "incentive_detail_id": 1,
     *                 "incentive_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_total_cost": "Example value",
     *                 "incentive_amount": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "is_deleted": true,
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgDoctorIncentiveDetailResource
     */
    public function store(StoreEcgDoctorIncentiveDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $incentiveDetail = $this->incentiveDetailService->createIncentiveDetail($validatedData);

            return $this->successResponse([
                'message' => 'Doctor incentive detail created successfully',
                'incentiveDetail' => new EcgDoctorIncentiveDetailResource($incentiveDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating doctor incentive detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create doctor incentive detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method GET
     *
     * Get a specific ecgdoctorincentivedetail
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentivedetail to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentiveDetail": {
     *                 "incentive_detail_id": 1,
     *                 "incentive_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_total_cost": "Example value",
     *                 "incentive_amount": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "is_deleted": true,
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgDoctorIncentiveDetailResource
     */
    public function show(EcgDoctorIncentiveDetail $ecgDoctorIncentiveDetail)
    {
        //
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method GET
     *
     * Edit ecgdoctorincentivedetail
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentivedetail to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentiveDetail": {
     *                 "incentive_detail_id": 1,
     *                 "incentive_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_total_cost": "Example value",
     *                 "incentive_amount": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "is_deleted": true,
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgDoctorIncentiveDetailResource
     */
    public function edit(EcgDoctorIncentiveDetail $ecgDoctorIncentiveDetail)
    {
        //
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method PUT
     *
     * Update an existing ecgdoctorincentivedetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentivedetail to update. Example: 1
     *
     * @bodyParam IncetiveId string optional. Maximum length: 255. Example: "Example IncetiveId"
     * @bodyParam PatientTreatmentDoneID string optional. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam TreatmentTotalCost number optional. numeric. Example: 1
     * @bodyParam IncentiveAmount number optional. numeric. Example: 1
     * @bodyParam IncentiveType string optional. Example: "Example IncentiveType"
     * @bodyParam IncentiveValue string optional. Example: "Example IncentiveValue"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "incentiveDetail": {
     *                 "incentive_detail_id": 1,
     *                 "incentive_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_total_cost": "Example value",
     *                 "incentive_amount": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "is_deleted": true,
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgDoctorIncentiveDetailResource
     */
    public function update(UpdateEcgDoctorIncentiveDetailRequest $request, EcgDoctorIncentiveDetail $ecgDoctorIncentiveDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedIncentiveDetail = $this->incentiveDetailService->updateIncentiveDetail($ecgDoctorIncentiveDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Doctor incentive detail updated successfully',
                'incentiveDetail' => new EcgDoctorIncentiveDetailResource($updatedIncentiveDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating doctor incentive detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update doctor incentive detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgDoctorIncentiveDetail
     *
     * @method DELETE
     *
     * Delete a ecgdoctorincentivedetail
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgdoctorincentivedetail to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcgDoctorIncentiveDetail $ecgDoctorIncentiveDetail)
    {
        //
    }
}
