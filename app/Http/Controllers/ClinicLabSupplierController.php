<?php

namespace App\Http\Controllers;

use App\Models\ClinicLabSupplier;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicLabSupplierService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicLabSupplierResource;
use App\Http\Requests\StoreClinicLabSupplierRequest;
use App\Http\Requests\UpdateClinicLabSupplierRequest;

class ClinicLabSupplierController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicLabSupplierService $clinicLabSupplierService)
    {
    }

    /**
     * @group ClinicLabSupplier
     *
     * @method GET
     *
     * List all cliniclabsupplier
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_lab_suppliers": [
     *                 {
     *                     "lab_supplier_id": 1,
     *                     "clinic_id": 1,
     *                     "supplier_name": "Example Name",
     *                     "registration_no": "Example value",
     *                     "contact_person": "Example value",
     *                     "email_address1": "user@example.com",
     *                     "email_address2": "user@example.com",
     *                     "notes": "Example value",
     *                     "address1": "Example value",
     *                     "address2": "Example value",
     *                     "is_email_lab_order_active": "user@example.com",
     *                     "is_active": true,
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

            $data = $this->clinicLabSupplierService->getClinicLabSuppliers($perPage);

            return $this->successResponse([
                'clinic_lab_suppliers' => ClinicLabSupplierResource::collection($data['clinic_lab_suppliers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic lab suppliers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicLabSupplier
     *
     * @method GET
     *
     * Create cliniclabsupplier
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_supplier": {
     *                 "lab_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "email_address1": "user@example.com",
     *                 "email_address2": "user@example.com",
     *                 "notes": "Example value",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "is_email_lab_order_active": "user@example.com",
     *                 "is_active": true,
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
     * @return ClinicLabSupplierResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicLabSupplier
     *
     * @method POST
     *
     * Create a new cliniclabsupplier
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SupplierName string required. Example: "Example SupplierName"
     * @bodyParam RegistrationNo string required. Example: "Example RegistrationNo"
     * @bodyParam ContactPerson string required. Example: "Example ContactPerson"
     * @bodyParam EmailAddress1 string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailAddress1"
     * @bodyParam EmailAddress2 string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailAddress2"
     * @bodyParam Notes string required. Example: "Example Notes"
     * @bodyParam Address1 string required. Example: "Example Address1"
     * @bodyParam Address2 string required. Example: "Example Address2"
     * @bodyParam IsEmailLabOrderActive string required. Must be a valid email address. Maximum length: 255. Example: "Example IsEmailLabOrderActive"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_supplier": {
     *                 "lab_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "email_address1": "user@example.com",
     *                 "email_address2": "user@example.com",
     *                 "notes": "Example value",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "is_email_lab_order_active": "user@example.com",
     *                 "is_active": true,
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
     * @return ClinicLabSupplierResource
     */
    public function store(StoreClinicLabSupplierRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $labSupplier = $this->clinicLabSupplierService->createLabSupplier($validatedData);

            return $this->successResponse([
                'message' => 'Lab supplier created successfully',
                'lab_supplier' => new ClinicLabSupplierResource($labSupplier)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating lab supplier: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create lab supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabSupplier
     *
     * @method GET
     *
     * Get a specific cliniclabsupplier
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabsupplier to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_supplier": {
     *                 "lab_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "email_address1": "user@example.com",
     *                 "email_address2": "user@example.com",
     *                 "notes": "Example value",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "is_email_lab_order_active": "user@example.com",
     *                 "is_active": true,
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
     * @return ClinicLabSupplierResource
     */
    public function show(ClinicLabSupplier $clinicLabSupplier)
    {
        //
    }

    /**
     * @group ClinicLabSupplier
     *
     * @method GET
     *
     * Edit cliniclabsupplier
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cliniclabsupplier to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_supplier": {
     *                 "lab_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "email_address1": "user@example.com",
     *                 "email_address2": "user@example.com",
     *                 "notes": "Example value",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "is_email_lab_order_active": "user@example.com",
     *                 "is_active": true,
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
     * @return ClinicLabSupplierResource
     */
    public function edit(ClinicLabSupplier $clinicLabSupplier)
    {
        //
    }

    /**
     * @group ClinicLabSupplier
     *
     * @method PUT
     *
     * Update an existing cliniclabsupplier
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabsupplier to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SupplierName string optional. Example: "Example SupplierName"
     * @bodyParam RegistrationNo string optional. Example: "Example RegistrationNo"
     * @bodyParam ContactPerson string optional. Example: "Example ContactPerson"
     * @bodyParam EmailAddress1 string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailAddress1"
     * @bodyParam EmailAddress2 string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailAddress2"
     * @bodyParam Notes string optional. Example: "Example Notes"
     * @bodyParam Address1 string optional. Example: "Example Address1"
     * @bodyParam Address2 string optional. Example: "Example Address2"
     * @bodyParam IsEmailLabOrderActive string optional. Must be a valid email address. Maximum length: 255. Example: "Example IsEmailLabOrderActive"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lab_supplier": {
     *                 "lab_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "email_address1": "user@example.com",
     *                 "email_address2": "user@example.com",
     *                 "notes": "Example value",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "is_email_lab_order_active": "user@example.com",
     *                 "is_active": true,
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
     * @return ClinicLabSupplierResource
     */
    public function update(UpdateClinicLabSupplierRequest $request, ClinicLabSupplier $clinicLabSupplier)
    {
        try {
            $validatedData = $request->validated();

            $updatedLabSupplier = $this->clinicLabSupplierService->updateLabSupplier($clinicLabSupplier, $validatedData);

            return $this->successResponse([
                'message' => 'Lab supplier updated successfully',
                'lab_supplier' => new ClinicLabSupplierResource($updatedLabSupplier)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lab supplier: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lab supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicLabSupplier
     *
     * @method DELETE
     *
     * Delete a cliniclabsupplier
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cliniclabsupplier to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicLabSupplier $clinicLabSupplier)
    {
        //
    }
}
