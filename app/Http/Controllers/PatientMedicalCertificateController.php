<?php

namespace App\Http\Controllers;

use App\Models\PatientMedicalCertificate;
use App\Http\Resources\PatientMedicalCertificateResource; // Assuming you have a resource for Patient Medical Certificate
use App\Services\PatientMedicalCertificateService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientMedicalCertificateRequest; // Assuming you have a request for storing medical certificates
use App\Http\Requests\UpdatePatientMedicalCertificateRequest; // Assuming you have a request for updating medical certificates
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup MedicalCertificate
 * @subgroupDescription PatientMedicalCertificateController handles the CRUD operations for patient medical certificate controller.
 */
class PatientMedicalCertificateController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientMedicalCertificateService $patientMedicalCertificateService)
    {
    }

    /**
     * @group PatientMedicalCertificate
     *
     * @method GET
     *
     * List all patientmedicalcertificate
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "medical_certificates": [
     *                 {
     *                     "patient_medical_certificate_id": 1,
     *                     "patient_id": 1,
     *                     "provider_id": 1,
     *                     "date_from": "Example value",
     *                     "date_to": "Example value",
     *                     "reason": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "rowguid": 1,
     *                     "out_patient_on": "Example value",
     *                     "in_patient_from": "Example value",
     *                     "in_patient_to": "Example value",
     *                     "certificate_type_id": 1
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
            $data = $this->patientMedicalCertificateService->getMedicalCertificates($patient, $perPage);

            return $this->successResponse([
                'medical_certificates' => PatientMedicalCertificateResource::collection($data['medical_certificates']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Medical Certificates: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientMedicalCertificate
     *
     * @method POST
     *
     * Create a new patientmedicalcertificate
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam DateFrom string required. date. Example: "Example DateFrom"
     * @bodyParam DateTo string required. date. Example: "Example DateTo"
     * @bodyParam Reason string required. Example: "Example Reason"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam OutPatientOn string required. Example: "Example OutPatientOn"
     * @bodyParam InPatientFrom string required. Example: "Example InPatientFrom"
     * @bodyParam InPatientTo string required. Example: "Example InPatientTo"
     * @bodyParam CertificateTypeID string required. Maximum length: 255. Example: "Example CertificateTypeID"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "medical_certificate": {
     *                 "patient_medical_certificate_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "date_from": "Example value",
     *                 "date_to": "Example value",
     *                 "reason": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1,
     *                 "out_patient_on": "Example value",
     *                 "in_patient_from": "Example value",
     *                 "in_patient_to": "Example value",
     *                 "certificate_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientMedicalCertificateResource
     */
    public function store(StorePatientMedicalCertificateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $certificate = $this->patientMedicalCertificateService->createMedicalCertificate($validatedData);

            return $this->successResponse([
                'message' => 'Medical certificate created successfully',
                'medical_certificate' => new PatientMedicalCertificateResource($certificate)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating medical certificate: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create medical certificate',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientMedicalCertificate
     *
     * @method PUT
     *
     * Update an existing patientmedicalcertificate
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientmedicalcertificate to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam DateFrom string optional. date. Example: "Example DateFrom"
     * @bodyParam DateTo string optional. date. Example: "Example DateTo"
     * @bodyParam Reason string optional. Example: "Example Reason"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam OutPatientOn string optional. Example: "Example OutPatientOn"
     * @bodyParam InPatientFrom string optional. Example: "Example InPatientFrom"
     * @bodyParam InPatientTo string optional. Example: "Example InPatientTo"
     * @bodyParam CertificateTypeID string optional. Maximum length: 255. Example: "Example CertificateTypeID"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "medical_certificate": {
     *                 "patient_medical_certificate_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "date_from": "Example value",
     *                 "date_to": "Example value",
     *                 "reason": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1,
     *                 "out_patient_on": "Example value",
     *                 "in_patient_from": "Example value",
     *                 "in_patient_to": "Example value",
     *                 "certificate_type_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientMedicalCertificateResource
     */
    public function update(UpdatePatientMedicalCertificateRequest $request, PatientMedicalCertificate $patientMedicalCertificate)
    {
        try {
            $validatedData = $request->validated();

            $updatedCertificate = $this->patientMedicalCertificateService->updateMedicalCertificate($patientMedicalCertificate, $validatedData);

            return $this->successResponse([
                'message' => 'Medical certificate updated successfully',
                'medical_certificate' => new PatientMedicalCertificateResource($updatedCertificate)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating medical certificate: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update medical certificate',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
