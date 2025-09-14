<?php

namespace App\Http\Controllers;

use App\Models\PatientSetting;
use App\Http\Resources\PatientSettingResource; // Assuming you have a resource for Patient Setting
use App\Services\PatientSettingService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientSettingRequest; // Assuming you have a request for storing patient settings
use App\Http\Requests\UpdatePatientSettingRequest; // Assuming you have a request for updating patient settings
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Settings
 * @subgroupDescription PatientSettingController handles the CRUD operations for patient setting controller.
 */
class PatientSettingController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientSettingService $patientSettingService)
    {
    }

    /**
     * @group PatientSetting
     *
     * @method GET
     *
     * List all patientsetting
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_settings": [
     *                 {
     *                     "patient_setting_id": 1,
     *                     "patient_treatment_id": 1,
     *                     "setting": "Example value",
     *                     "setting_date": "Example value",
     *                     "provider_id": 1,
     *                     "provider_incharge_id": 1,
     *                     "work_done": "Example value",
     *                     "req_lab_work": "Example value",
     *                     "setting_note": "Example value",
     *                     "estimated_cost": "Example value",
     *                     "mode_of_payment": "Example value",
     *                     "amount_paid": 1,
     *                     "balance_amount": "Example value",
     *                     "available_balance": "Example value",
     *                     "cheque_no": "Example value",
     *                     "cheque_date": "Example value",
     *                     "bank_name": "Example Name",
     *                     "credit_card_bank_id": 1,
     *                     "credit_card_digit": "Example value",
     *                     "credit_card_owner": "Example value",
     *                     "credit_card_valid_from": 1,
     *                     "credit_card_valid_to": 1,
     *                     "is_deleted": true,
     *                     "added_on": "Example value",
     *                     "added_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "setting_id": 1,
     *                     "id": 1,
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientSettingService->getPatientSettings($patient, $perPage);

            return $this->successResponse([
                'patient_settings' => PatientSettingResource::collection($data['patient_settings']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Settings: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientSetting
     *
     * @method POST
     *
     * Create a new patientsetting
     *
     * @post /
     *
     * @bodyParam PatientSettingID string required. Maximum length: 255. Example: "Example PatientSettingID"
     * @bodyParam CreditCardValidTo string optional. nullable. Maximum length: 50. Example: "1"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam AddedOn string optional. nullable. date. Example: "Example AddedOn"
     * @bodyParam AddedBy string optional. nullable. Maximum length: 255. Example: "Example AddedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam SettingID number required. integer. Example: 1
     * @bodyParam ID number optional. nullable. integer. Example: 1
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "setting": {
     *                 "patient_setting_id": 1,
     *                 "patient_treatment_id": 1,
     *                 "setting": "Example value",
     *                 "setting_date": "Example value",
     *                 "provider_id": 1,
     *                 "provider_incharge_id": 1,
     *                 "work_done": "Example value",
     *                 "req_lab_work": "Example value",
     *                 "setting_note": "Example value",
     *                 "estimated_cost": "Example value",
     *                 "mode_of_payment": "Example value",
     *                 "amount_paid": 1,
     *                 "balance_amount": "Example value",
     *                 "available_balance": "Example value",
     *                 "cheque_no": "Example value",
     *                 "cheque_date": "Example value",
     *                 "bank_name": "Example Name",
     *                 "credit_card_bank_id": 1,
     *                 "credit_card_digit": "Example value",
     *                 "credit_card_owner": "Example value",
     *                 "credit_card_valid_from": 1,
     *                 "credit_card_valid_to": 1,
     *                 "is_deleted": true,
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "setting_id": 1,
     *                 "id": 1,
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientSettingResource
     */
    public function store(StorePatientSettingRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $setting = $this->patientSettingService->createSetting($validatedData);

            return $this->successResponse([
                'message' => 'Patient setting created successfully',
                'setting' => new PatientSettingResource($setting)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient setting: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient setting',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientSetting
     *
     * @method PUT
     *
     * Update an existing patientsetting
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientsetting to update. Example: 1
     *
     * @bodyParam PatientSettingID string optional. Maximum length: 255. Example: "Example PatientSettingID"
     * @bodyParam CreditCardValidTo string optional. nullable. Maximum length: 50. Example: "1"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam AddedOn string optional. nullable. date. Example: "Example AddedOn"
     * @bodyParam AddedBy string optional. nullable. Maximum length: 255. Example: "Example AddedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam SettingID number optional. integer. Example: 1
     * @bodyParam ID number optional. nullable. integer. Example: 1
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "setting": {
     *                 "patient_setting_id": 1,
     *                 "patient_treatment_id": 1,
     *                 "setting": "Example value",
     *                 "setting_date": "Example value",
     *                 "provider_id": 1,
     *                 "provider_incharge_id": 1,
     *                 "work_done": "Example value",
     *                 "req_lab_work": "Example value",
     *                 "setting_note": "Example value",
     *                 "estimated_cost": "Example value",
     *                 "mode_of_payment": "Example value",
     *                 "amount_paid": 1,
     *                 "balance_amount": "Example value",
     *                 "available_balance": "Example value",
     *                 "cheque_no": "Example value",
     *                 "cheque_date": "Example value",
     *                 "bank_name": "Example Name",
     *                 "credit_card_bank_id": 1,
     *                 "credit_card_digit": "Example value",
     *                 "credit_card_owner": "Example value",
     *                 "credit_card_valid_from": 1,
     *                 "credit_card_valid_to": 1,
     *                 "is_deleted": true,
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "setting_id": 1,
     *                 "id": 1,
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
     * @return PatientSettingResource
     */
    public function update(UpdatePatientSettingRequest $request, PatientSetting $patientSetting)
    {
        try {
            $validatedData = $request->validated();

            $updatedSetting = $this->patientSettingService->updateSetting($patientSetting, $validatedData);

            return $this->successResponse([
                'message' => 'Patient setting updated successfully',
                'setting' => new PatientSettingResource($updatedSetting)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient setting: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient setting',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
