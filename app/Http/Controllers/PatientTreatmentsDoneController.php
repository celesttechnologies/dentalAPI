<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientTreatmentsDoneResource; // Assuming you have a resource for Patient Treatments Done
use App\Models\PatientTreatmentsDone;
use App\Services\PatientTreatmentsDoneService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientTreatmentsDoneRequest;
use App\Http\Requests\UpdatePatientTreatmentsDoneRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup TreatmentsDone
 * @subgroupDescription PatientTreatmentsDoneController handles the CRUD operations for patient treatment controller.
 */
class PatientTreatmentsDoneController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientTreatmentsDoneService $patientTreatmentsDoneService)
    {
    }

    /**
     * @group PatientTreatmentsDone
     *
     * @method GET
     *
     * List all patienttreatmentsdone
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_treatments_done": [
     *                 []
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
            $status = $request->query('status', 'ongoing');
            $startDate = $request->query('startDate');
            $endDate = $request->query('endDate');
            $data = $this->patientTreatmentsDoneService->getPatientTreatmentsDone($patient, $perPage, $status, $startDate, $endDate);

            return $this->successResponse([
                'patient_treatments_done' => PatientTreatmentsDoneResource::collection($data['patient_treatments_done']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Treatments Done: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientTreatmentsDone
     *
     * @method POST
     *
     * Create a new patienttreatmentsdone
     *
     * @post /
     *
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentCost number required. numeric. Example: 1
     * @bodyParam TreatmentDiscount string optional. nullable. Example: "Example TreatmentDiscount"
     * @bodyParam TreatmentTotalCost number required. numeric. Example: 1
     * @bodyParam TreatmentPayment string required. Example: "Example TreatmentPayment"
     * @bodyParam TreatmentDate string required. date. Example: "Example TreatmentDate"
     * @bodyParam ParentPatientTreatmentDoneID string optional. nullable. Maximum length: 255. Example: "Example ParentPatientTreatmentDoneID"
     * @bodyParam TreatmentAddition string optional. nullable. Example: "Example TreatmentAddition"
     * @bodyParam TeethTreatmentNote string required. Example: "Example TeethTreatmentNote"
     * @bodyParam TreatmentTypeID string required. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam TreatmentSubTypeID string optional. nullable. Maximum length: 255. Example: "Example TreatmentSubTypeID"
     * @bodyParam TeethTreatment string required. Example: "Example TeethTreatment"
     * @bodyParam isPrimaryTooth boolean required. Example: true
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_done": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentsDoneResource
     */
    public function store(StorePatientTreatmentsDoneRequest $request, Patient $patient)
    {
        try {
            $validatedData = $request->validated();

            $treatmentDone = $this->patientTreatmentsDoneService->createTreatmentDone($validatedData, $patient);

            return $this->successResponse([
                'message' => 'Treatment record created successfully',
                'treatment_done' => new PatientTreatmentsDoneResource($treatmentDone)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating treatment done record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create treatment record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientTreatmentsDone
     *
     * @method PUT
     *
     * Update an existing patienttreatmentsdone
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienttreatmentsdone to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentCost number optional. numeric. Example: 1
     * @bodyParam TreatmentDiscount string optional. Example: "Example TreatmentDiscount"
     * @bodyParam TreatmentTax string optional. Example: "Example TreatmentTax"
     * @bodyParam TreatmentTotalCost number optional. numeric. Example: 1
     * @bodyParam TreatmentPayment string optional. Example: "Example TreatmentPayment"
     * @bodyParam TreatmentBalance string optional. Example: "Example TreatmentBalance"
     * @bodyParam ModeofPayment string optional. Example: "Example ModeofPayment"
     * @bodyParam ChequeNo string optional. Example: "Example ChequeNo"
     * @bodyParam ChequeDate string optional. date. Example: "Example ChequeDate"
     * @bodyParam BankName string optional. Example: "Example BankName"
     * @bodyParam CreditCardBankID string optional. Maximum length: 255. Example: "Example CreditCardBankID"
     * @bodyParam CreditCardDigit string optional. Example: "Example CreditCardDigit"
     * @bodyParam CreditCardOwner string optional. Example: "Example CreditCardOwner"
     * @bodyParam CreditCardValidFrom string optional. Maximum length: 255. Example: "1"
     * @bodyParam CreditCardValidTo string optional. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentDate string optional. date. Example: "Example TreatmentDate"
     * @bodyParam ProviderInchargeID string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam ReceiptDate string optional. date. Example: "Example ReceiptDate"
     * @bodyParam ReceiptNo string optional. Example: "Example ReceiptNo"
     * @bodyParam IsArchived string optional. Example: "Example IsArchived"
     * @bodyParam ParentPatientTreatmentDoneID string optional. Maximum length: 255. Example: "Example ParentPatientTreatmentDoneID"
     * @bodyParam TreatmentAddition string optional. Example: "Example TreatmentAddition"
     * @bodyParam WaitingAreaID string optional. Maximum length: 255. Example: "Example WaitingAreaID"
     * @bodyParam AmountToBeCollected number optional. numeric. Example: 1
     * @bodyParam TeethTreatmentNote string optional. Example: "Example TeethTreatmentNote"
     * @bodyParam ArchivedOn string optional. Example: "Example ArchivedOn"
     * @bodyParam isPrimaryTooth boolean optional. Example: true
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_done": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentsDoneResource
     */
    public function update(UpdatePatientTreatmentsDoneRequest $request, string $patient, string $patientTreatmentsDone)
    {
        try {
            $validatedData = $request->validated();
            Log::info('Updating treatment done record with data: ', ['patientTreatmentsDone' => $patientTreatmentsDone]);
            $updatedTreatmentDone = $this->patientTreatmentsDoneService->updateTreatmentDone($patientTreatmentsDone, $validatedData);

            return $this->successResponse([
                'message' => 'Treatment record updated successfully',
                'treatment_done' => new PatientTreatmentsDoneResource($updatedTreatmentDone)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating treatment done record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update treatment record',
                'error' => $e->getFile() . ':' . $e->getLine() . ' - ' . $e->getMessage()
            ], 500);
        }
    }
}
