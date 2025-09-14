<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicResource;
use App\Http\Requests\StoreClinicRequest;
use App\Http\Requests\UpdateClinicRequest;

class ClinicController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicService $clinicService)
    {
    }

    /**
     * @group Clinic
     *
     * @method GET
     *
     * List all clinic
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinics": [
     *                 {
     *                     "clinic_id": 1,
     *                     "name": "Example Name",
     *                     "address1": "Example value",
     *                     "address2": "Example value",
     *                     "city": "Example value",
     *                     "state": "Example value",
     *                     "country_id": 1,
     *                     "phone": "Example value",
     *                     "fax": "Example value",
     *                     "email": "user@example.com",
     *                     "description": "Example value",
     *                     "authentication_key": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "ftp_backup_server": "Example value",
     *                     "ftp_password": "Example value",
     *                     "ftp_user_id": 1,
     *                     "email_host": "user@example.com",
     *                     "email_password": "user@example.com",
     *                     "email_port": "user@example.com",
     *                     "email_userid": "user@example.com",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "authentication_key_guid": 1,
     *                     "license_type_id": 1,
     *                     "license_valid_till": 1,
     *                     "clinic_code": "Example value",
     *                     "clinic_letterhead_header": "Example value",
     *                     "clinic_logo": "Example value",
     *                     "rowguid": 1,
     *                     "patient_kiosk_tab_access": "Example value"
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

            $data = $this->clinicService->getClinics($perPage);

            return $this->successResponse([
                'clinics' => ClinicResource::collection($data['clinics']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinics: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group Clinic
     *
     * @method POST
     *
     * Create a new clinic
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Name string required. Maximum length: 255. Example: "Example Name"
     * @bodyParam Address1 string optional. nullable. Maximum length: 255. Example: "Example Address1"
     * @bodyParam Address2 string required. Maximum length: 255. Example: "Example Address2"
     * @bodyParam City string optional. nullable. Maximum length: 255. Example: "Example City"
     * @bodyParam State string optional. nullable. Maximum length: 255. Example: "Example State"
     * @bodyParam CountryID number required. integer. Example: 1
     * @bodyParam Phone string optional. nullable. Maximum length: 15. Example: "Example Phone"
     * @bodyParam Fax string optional. nullable. Maximum length: 15. Example: "Example Fax"
     * @bodyParam Email string optional. nullable. Must be a valid email address. Example: "Example Email"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam AuthenticationKey string optional. nullable. Maximum length: 255. Example: "Example AuthenticationKey"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam FTPBackupServer string optional. nullable. Maximum length: 255. Example: "Example FTPBackupServer"
     * @bodyParam FTPPassword string optional. nullable. Maximum length: 255. Example: "Example FTPPassword"
     * @bodyParam FTPUserID string optional. nullable. Maximum length: 255. Example: "Example FTPUserID"
     * @bodyParam EmailHost string optional. nullable. Maximum length: 255. Example: "Example EmailHost"
     * @bodyParam EmailPassword string optional. nullable. Maximum length: 255. Example: "Example EmailPassword"
     * @bodyParam EmailPort string optional. nullable. Maximum length: 50. Example: "Example EmailPort"
     * @bodyParam EmailUserid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam AuthenticationKeyGuid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam LicenseTypeID number required. integer. Example: 1
     * @bodyParam LicenseValidTill string optional. nullable. date. Example: "1"
     * @bodyParam ClinicCode string optional. nullable. Maximum length: 100. Example: "Example ClinicCode"
     * @bodyParam ClinicLetterHeadHeader string optional. nullable. Example: "Example ClinicLetterHeadHeader"
     * @bodyParam ClinicLogo string optional. nullable. Example: "Example ClinicLogo"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam PatientKioskTabAccess string optional. nullable. Maximum length: 100. Example: "Example PatientKioskTabAccess"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic": {
     *                 "clinic_id": 1,
     *                 "name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "phone": "Example value",
     *                 "fax": "Example value",
     *                 "email": "user@example.com",
     *                 "description": "Example value",
     *                 "authentication_key": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "ftp_backup_server": "Example value",
     *                 "ftp_password": "Example value",
     *                 "ftp_user_id": 1,
     *                 "email_host": "user@example.com",
     *                 "email_password": "user@example.com",
     *                 "email_port": "user@example.com",
     *                 "email_userid": "user@example.com",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "authentication_key_guid": 1,
     *                 "license_type_id": 1,
     *                 "license_valid_till": 1,
     *                 "clinic_code": "Example value",
     *                 "clinic_letterhead_header": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "rowguid": 1,
     *                 "patient_kiosk_tab_access": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicResource
     */
    public function store(StoreClinicRequest $request)
    {
        try {
            $validated = $request->validated();

            $clinic = $this->clinicService->createClinic($validated);

            return $this->successResponse([
                'message' => 'Clinic created successfully',
                'clinic' => new ClinicResource($clinic)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong while creating the clinic.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Clinic
     *
     * @method PUT
     *
     * Update an existing clinic
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinic to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Name string optional. Maximum length: 255. Example: "Example Name"
     * @bodyParam Address1 string optional. nullable. Maximum length: 255. Example: "Example Address1"
     * @bodyParam Address2 string optional. Maximum length: 255. Example: "Example Address2"
     * @bodyParam City string optional. nullable. Maximum length: 255. Example: "Example City"
     * @bodyParam State string optional. nullable. Maximum length: 255. Example: "Example State"
     * @bodyParam CountryID number optional. integer. Example: 1
     * @bodyParam Phone string optional. nullable. Maximum length: 15. Example: "Example Phone"
     * @bodyParam Fax string optional. nullable. Maximum length: 15. Example: "Example Fax"
     * @bodyParam Email string optional. nullable. Must be a valid email address. Example: "Example Email"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam AuthenticationKey string optional. nullable. Maximum length: 255. Example: "Example AuthenticationKey"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam FTPBackupServer string optional. nullable. Maximum length: 255. Example: "Example FTPBackupServer"
     * @bodyParam FTPPassword string optional. nullable. Maximum length: 255. Example: "Example FTPPassword"
     * @bodyParam FTPUserID string optional. nullable. Maximum length: 255. Example: "Example FTPUserID"
     * @bodyParam EmailHost string optional. nullable. Maximum length: 255. Example: "Example EmailHost"
     * @bodyParam EmailPassword string optional. nullable. Maximum length: 255. Example: "Example EmailPassword"
     * @bodyParam EmailPort string optional. nullable. Maximum length: 50. Example: "Example EmailPort"
     * @bodyParam EmailUserid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam AuthenticationKeyGuid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam LicenseTypeID number optional. integer. Example: 1
     * @bodyParam LicenseValidTill string optional. nullable. date. Example: "1"
     * @bodyParam ClinicCode string optional. nullable. Maximum length: 100. Example: "Example ClinicCode"
     * @bodyParam ClinicLetterHeadHeader string optional. nullable. Example: "Example ClinicLetterHeadHeader"
     * @bodyParam ClinicLogo string optional. nullable. Example: "Example ClinicLogo"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     * @bodyParam PatientKioskTabAccess string optional. nullable. Maximum length: 100. Example: "Example PatientKioskTabAccess"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic": {
     *                 "clinic_id": 1,
     *                 "name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "phone": "Example value",
     *                 "fax": "Example value",
     *                 "email": "user@example.com",
     *                 "description": "Example value",
     *                 "authentication_key": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "ftp_backup_server": "Example value",
     *                 "ftp_password": "Example value",
     *                 "ftp_user_id": 1,
     *                 "email_host": "user@example.com",
     *                 "email_password": "user@example.com",
     *                 "email_port": "user@example.com",
     *                 "email_userid": "user@example.com",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "authentication_key_guid": 1,
     *                 "license_type_id": 1,
     *                 "license_valid_till": 1,
     *                 "clinic_code": "Example value",
     *                 "clinic_letterhead_header": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "rowguid": 1,
     *                 "patient_kiosk_tab_access": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicResource
     */
    public function update(UpdateClinicRequest $request, Clinic $clinic)
    {
        try {
            $validated = $request->validated();

            $updatedClinic = $this->clinicService->updateClinic($clinic, $validated);

            return $this->successResponse([
                'message' => 'Clinic updated successfully',
                'clinic' => new ClinicResource($updatedClinic)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong while updating the clinic.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
