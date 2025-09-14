<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Services\PatientService;
use App\Services\PatientDiagnosisService;
use Illuminate\Http\Request;
use Exception;
use App\Traits\ApiResponse;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\StorePatientTreatmentsPlanDetailRequest;
use App\Http\Requests\PatientPhotoRequest;
use App\Http\Resources\PatientDiagnosisResource;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientTreatmentsPlanHeaderResource;
use App\Services\PatientTreatmentsPlanService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @group Patient
 * PatientController handles the CRUD operations for patient controller.
 */
class PatientController extends Controller
{
    use ApiResponse;

    public function __construct(
        private PatientService $patientService,
        private PatientDiagnosisService $patientDiagnosisService,
        private PatientTreatmentsPlanService $patientTreatmentsPlanService
    ) {
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * IndexOld patient
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patients": [
     *                 {
     *                     "id": 1,
     *                     "title": "Example value",
     *                     "first_name": "Example Name",
     *                     "last_name": "Example Name",
     *                     "gender": "Example value",
     *                     "dob": "Example value",
     *                     "phone": "Example value",
     *                     "mobile": "Example value",
     *                     "email": "user@example.com",
     *                     "email2": "user@example.com",
     *                     "occupation": "Example value",
     *                     "case_id": 1,
     *                     "patient_code": "Example value",
     *                     "age": "Example value",
     *                     "registration_date": "Example value",
     *                     "referred_by": "Example value",
     *                     "abha_id": "some abha_id",
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
    public function indexOld(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $search = $request->query('search', null);
            $dateFilter = $request->query('dateFilter', 'all');
            $startDate = $request->query('startDate');
            $endDate = $request->query('endDate');

            // Attempt to fetch the patient list from the service
            $patientList = $this->patientService->getPatients($perPage, $search, $dateFilter, $startDate, $endDate);

            // Return the patient list in a successful response
            return $this->successResponse(['patients' => PatientResource::collection($patientList['patients']), 'pagination' => $patientList['pagination']]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * List all patient
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $search = $request->query('search');
            $dateFilter = $request->query('dateFilter', 'all');
            $startDate = $request->query('startDate');
            $endDate = $request->query('endDate');

            // Use the new Elasticsearch-based service method
            $patientList = $this->patientService->getPatientsNew($perPage, $search, $dateFilter, $startDate, $endDate);

            return $this->successResponse([
                'patients' => \App\Http\Resources\PatientResource::collection($patientList['patients']),
                'pagination' => $patientList['pagination']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'An error occurred while retrieving patients.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * Advance Search for patients
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function advanceSearch(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            // Accept JSON either in query param ?filters={...} or request body
            $raw = $request->query('filters') ?? $request->input('filters') ?? $request->getContent();
            $filters = [];
            if (is_array($raw)) {
                $filters = $raw;
            } elseif (is_string($raw) && trim($raw) !== '') {
                $decoded = json_decode($raw, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $filters = $decoded;
                }
            }
            // Whitelist expected keys
            $filters = array_intersect_key($filters, array_flip(['building','first_name','last_name','mobile']));

            $patientList = $this->patientService->advancedSearchPatients($perPage, $filters);

            return $this->successResponse([
                'patients' => \App\Http\Resources\PatientResource::collection($patientList['patients']),
                'pagination' => $patientList['pagination']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'An error occurred while retrieving patients.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group Patient
     *
     * @method POST
     *
     * Create a new patient
     *
     * @post /
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $patient = $this->patientService->createPatient($validatedData);

            return $this->successResponse([
                'message' => 'Patient created successfully',
                'patient' => $patient
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * Get a specific patient
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the patient to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Patient $patient)
    {
        try {
            $patient = $this->patientService->getPatientWithAppointments($patient);

            return $this->successResponse(['patient' => $patient], 200);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'An error occurred while retrieving the patient.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Patient
     *
     * @method PUT
     *
     * Update an existing patient
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patient to update. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        try {
            $updatedPatient = $this->patientService->updatePatient($patient, $request->validated());

            return $this->successResponse([
                'message' => 'Patient update successfully',
                'patient' => $updatedPatient
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'error' => 'Failed to update patient',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * @group Patient
     *
     * @method DELETE
     *
     * Delete a patient
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the patient to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Patient $patient)
    {
        try {
            $this->patientService->deletePatient($patient);

            return $this->successResponse(['message' => 'Patient deleted successfully']);
        } catch (Exception $e) {
            return $this->errorResponse(['error' => 'Something went wrong', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * GetPatientDiagnosis patient
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnosis": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "date_of_diagnosis": "Example value",
     *                     "provider_id": 1,
     *                     "chief_complaint": "Example value",
     *                     "notes": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "row_guid": 1
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
    public function getPatientDiagnosis(Request $request, Patient $patient)
    {
        try {
            $perPage = env('PAGINATION_LIMIT', 10); // Fetch pagination limit from .env

            // Fetch patient diagnosis data from service
            $patientDiagnoses = $this->patientDiagnosisService->getDiagnoses($patient, $perPage);

            return $this->successResponse([
                'patient' => $patient,
                'diagnosis' => PatientDiagnosisResource::collection($patientDiagnoses['data']),
                'pagination' => $patientDiagnoses['pagination']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'An error occurred while retrieving patient diagnosis.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * StoreTreatmentPlanDetails patient
     *
     * @get /
     *
     * @bodyParam TreatmentPlanName string required. Maximum length: 255. Example: "Example TreatmentPlanName"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentCost number required. numeric. Example: 1
     * @bodyParam TreatmentTotalCost number required. numeric. Example: 1
     * @bodyParam TreatmentDiscount number required. numeric. Example: 1
     * @bodyParam TreatmentAddition number required. numeric. Example: 1
     * @bodyParam TreatmentDate string required. date. Example: "Example TreatmentDate"
     * @bodyParam TreatmentDetails array required. Example: []
     * @bodyParam TreatmentDetails.*.TreatmentTypeID string required. Maximum length: 255. Example: "Example TreatmentDetails.*.TreatmentTypeID"
     * @bodyParam TreatmentDetails.*.TeethTreatment string required. Example: "Example TreatmentDetails.*.TeethTreatment"
     * @bodyParam TreatmentDetails.*.TeethTreatmentNote string required. Example: "Example TreatmentDetails.*.TeethTreatmentNote"
     * @bodyParam TreatmentDetails.*.TreatmentCost number required. numeric. Example: 1
     * @bodyParam TreatmentDetails.*.TreatmentDiscount number required. numeric. Example: 1
     * @bodyParam TreatmentDetails.*.TreatmentAddition number required. numeric. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_plan_detail": {
     *                 "ID": "Example value",
     *                 "PatientID": "Example value",
     *                 "ProviderID": 1,
     *                 "TreatmentPlanName": "Example value",
     *                 "TreatmentCost": "Example value",
     *                 "TreatmentDiscount": "Example value",
     *                 "TreatmentTax": "Example value",
     *                 "TreatmentTotalCost": "Example value",
     *                 "TreatmentDate": "Example value",
     *                 "ProviderInchargeID": 1,
     *                 "IsDeleted": "Example value",
     *                 "AddedBy": "Example value",
     *                 "AddedOn": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value",
     *                 "IsArchived": "Example value",
     *                 "ParentPatientTreatmentDoneID": "Example value",
     *                 "TreatmentAddition": "Example value",
     *                 "TreatmentPlanStatusID": "Example value",
     *                 "TreatmentDetails": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentsPlanHeaderResource
     */
    public function storeTreatmentPlanDetails(StorePatientTreatmentsPlanDetailRequest $request, Patient $patient)
    {
        try {
            $validatedData = $request->validated();

            $planDetail = $this->patientTreatmentsPlanService->createTreatmentsPlan($validatedData, $patient);

            return $this->successResponse([
                'message' => 'Treatment plan detail created successfully',
                'treatment_plan_detail' => new PatientTreatmentsPlanHeaderResource($planDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating treatment plan detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create treatment plan detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Patient
     *
     * @method POST
     *
     * Upload a photo for a patient
     *
     * @post /{id}/upload-photo
     *
     * @urlParam id integer required. The ID of the patient to upload the photo for. Example: 1
     * @bodyParam photo file required. The photo file to upload. Must be an image.
     * @response 200 {"message": "Photo uploaded successfully", "photo_url": "url/to/photo.jpg"}
     * @response 400 {"message": "Validation error", "errors": {"photo": ["The photo must be an image."]}}
     * @response 404 {"message": "Patient not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadPhoto(PatientPhotoRequest $request, Patient $patient)
    {
        try {
            $file = $request->file('photo');
            $fileName = 'patient_' . $patient->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('patient_photos', $fileName, config('filesystems.default'));
            $disk = config('filesystems.default');
            $publicPath = $disk === 'public' ? 'storage/' . $filePath : $filePath;

            // Use PatientService to store the photo path
            $this->patientService->storePatientPhoto($patient, $publicPath);

            return $this->successResponse([
                'message' => 'Photo uploaded successfully',
                'photo_url' => asset($publicPath)
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'Failed to upload photo',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Patient
     *
     * @method GET
     *
     * Get all details for a patient (personal, contact, medical, examination, treatments done)
     *
     * @get /{id}/full-details
     *
     * @urlParam id integer required. The ID of the patient to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *   "data": {
     *     "personal": { ... },
     *     "contact": { ... },
     *     "medical": { ... },
     *     "examination": { ... },
     *     "treatments_done": [ ... ]
     *   }
     * }
     *
     * @response 404 {"message": "Patient not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function fullDetails(Patient $patient)
    {
        try {
            // Personal info
            $personal = [
                'id' => $patient->PatientID ?? $patient->id,
                'code' => $patient->PatientCode ?? $patient->patient_code ?? null,
                'title' => $patient->Title ?? null,
                'first_name' => $patient->FirstName ?? $patient->first_name ?? null,
                'last_name' => $patient->LastName ?? $patient->last_name ?? null,
                'gender' => $patient->Gender ?? $patient->gender ?? null,
                'dob' => $patient->DOB ?? $patient->dob ?? null,
                'age' => $patient->Age ?? $patient->age ?? null,
                'registration_date' => $patient->RegistrationDate ?? $patient->registration_date ?? null,
            ];

            // Contact info
            $contact = [
                'phone' => $patient->Phone ?? $patient->phone ?? null,
                'mobile' => $patient->MobileNumber ?? $patient->mobile ?? null,
                'email' => $patient->Email ?? $patient->email ?? null,
                'email2' => $patient->Email2 ?? $patient->email2 ?? null,
                'address' => $patient->AddressLine1 ?? $patient->address ?? null,
                'city' => $patient->City ?? $patient->city ?? null,
                'state' => $patient->State ?? $patient->state ?? null,
                'country' => $patient->Country ?? $patient->country ?? null,
                'zip' => $patient->ZipCode ?? $patient->zip ?? null,
            ];

            // Medical details (diagnosis, allergies, etc.)
            $medical = [
                'diagnosis' => $patient->patient_diagnosis ?? ($patient->patient_diagnosis ?? []),
                'allergies' => $patient->patient_allergy_attributes ?? [],
                'abha_id' => $patient->AbhaID ?? null,
            ];

            // Examination (last/active examination, etc.)
            $examination = $patient->patient_investigations ?? [];

            // Treatments done (history)
            $treatmentsDone = $patient->patient_treatments_done ?? ($patient->patient_treatments_done ?? []);

            return $this->successResponse([
                'personal' => $personal,
                'contact' => $contact,
                'medical' => $medical,
                'examination' => $examination,
                'treatments_done' => $treatmentsDone,
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'Failed to fetch patient full details',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function parseArrayQueryParam($value)
    {
        if (is_array($value)) return array_values($value);
        if (is_null($value) || $value === '') return null;
        $trim = trim($value);
        if (Str::startsWith($trim, '[') && Str::endsWith($trim, ']')) {
            $json = str_replace("'", '"', $trim);
            $decoded = json_decode($json, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) return array_values($decoded);
        }
        if (strpos($value, ',') !== false) return array_values(array_filter(array_map('trim', explode(',', $value))));
        return [$value];
    }
}
