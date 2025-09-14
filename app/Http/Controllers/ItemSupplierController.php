<?php

namespace App\Http\Controllers;

use App\Models\ItemSupplier;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemSupplierService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemSupplierResource;
use App\Http\Requests\StoreItemSupplierRequest;
use App\Http\Requests\UpdateItemSupplierRequest;

class ItemSupplierController extends Controller
{
    use ApiResponse;

    public function __construct(private ItemSupplierService $supplierService)
    {
    }

    /**
     * @group ItemSupplier
     *
     * @method GET
     *
     * List all itemsupplier
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_suppliers": [
     *                 {
     *                     "item_supplier_id": 1,
     *                     "clinic_id": 1,
     *                     "supplier_name": "Example Name",
     *                     "registration_no": "Example value",
     *                     "contact_person": "Example value",
     *                     "notes": "Example value",
     *                     "street1": "Example value",
     *                     "street2": "Example value",
     *                     "city": "Example value",
     *                     "state": "Example value",
     *                     "country": "Example value",
     *                     "postcode": "Example value",
     *                     "isd": "Example value",
     *                     "std": "Example value",
     *                     "phone": "Example value",
     *                     "permanent_address": "Example value",
     *                     "added_on": "Example value",
     *                     "added_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "deleted_on": "Example value",
     *                     "deleted_by": "Example value",
     *                     "is_active": true,
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
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->supplierService->getItemSuppliers($perPage);

            return $this->successResponse([
                'item_suppliers' => ItemSupplierResource::collection($data['suppliers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Item Suppliers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ItemSupplier
     *
     * @method GET
     *
     * Create itemsupplier
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "supplier": {
     *                 "item_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "notes": "Example value",
     *                 "street1": "Example value",
     *                 "street2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country": "Example value",
     *                 "postcode": "Example value",
     *                 "isd": "Example value",
     *                 "std": "Example value",
     *                 "phone": "Example value",
     *                 "permanent_address": "Example value",
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "deleted_on": "Example value",
     *                 "deleted_by": "Example value",
     *                 "is_active": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemSupplierResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ItemSupplier
     *
     * @method POST
     *
     * Create a new itemsupplier
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SupplierName string required. Example: "Example SupplierName"
     * @bodyParam RegistrationNo string required. Example: "Example RegistrationNo"
     * @bodyParam ContactPerson string required. Example: "Example ContactPerson"
     * @bodyParam Notes string required. Example: "Example Notes"
     * @bodyParam Street1 string required. Example: "Example Street1"
     * @bodyParam Street2 string required. Example: "Example Street2"
     * @bodyParam City string required. Example: "Example City"
     * @bodyParam State string required. Example: "Example State"
     * @bodyParam Country string required. Example: "Example Country"
     * @bodyParam Postcode string required. Example: "Example Postcode"
     * @bodyParam ISD string required. Example: "Example ISD"
     * @bodyParam STD string required. Example: "Example STD"
     * @bodyParam Phone string required. Example: "Example Phone"
     * @bodyParam PermanentAddress string required. Example: "Example PermanentAddress"
     * @bodyParam AddedOn string required. Example: "Example AddedOn"
     * @bodyParam AddedBy string required. Example: "Example AddedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam DeletedOn string required. Example: "Example DeletedOn"
     * @bodyParam DeletedBy string required. Example: "Example DeletedBy"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "supplier": {
     *                 "item_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "notes": "Example value",
     *                 "street1": "Example value",
     *                 "street2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country": "Example value",
     *                 "postcode": "Example value",
     *                 "isd": "Example value",
     *                 "std": "Example value",
     *                 "phone": "Example value",
     *                 "permanent_address": "Example value",
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "deleted_on": "Example value",
     *                 "deleted_by": "Example value",
     *                 "is_active": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemSupplierResource
     */
    public function store(StoreItemSupplierRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $supplier = $this->supplierService->createSupplier($validatedData);

            return $this->successResponse([
                'message' => 'Item supplier created successfully',
                'supplier' => new ItemSupplierResource($supplier)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating item supplier: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create item supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemSupplier
     *
     * @method GET
     *
     * Get a specific itemsupplier
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the itemsupplier to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "supplier": {
     *                 "item_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "notes": "Example value",
     *                 "street1": "Example value",
     *                 "street2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country": "Example value",
     *                 "postcode": "Example value",
     *                 "isd": "Example value",
     *                 "std": "Example value",
     *                 "phone": "Example value",
     *                 "permanent_address": "Example value",
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "deleted_on": "Example value",
     *                 "deleted_by": "Example value",
     *                 "is_active": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemSupplierResource
     */
    public function show(ItemSupplier $itemSupplier)
    {
        //
    }

    /**
     * @group ItemSupplier
     *
     * @method GET
     *
     * Edit itemsupplier
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the itemsupplier to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "supplier": {
     *                 "item_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "notes": "Example value",
     *                 "street1": "Example value",
     *                 "street2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country": "Example value",
     *                 "postcode": "Example value",
     *                 "isd": "Example value",
     *                 "std": "Example value",
     *                 "phone": "Example value",
     *                 "permanent_address": "Example value",
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "deleted_on": "Example value",
     *                 "deleted_by": "Example value",
     *                 "is_active": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemSupplierResource
     */
    public function edit(ItemSupplier $itemSupplier)
    {
        //
    }

    /**
     * @group ItemSupplier
     *
     * @method PUT
     *
     * Update an existing itemsupplier
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the itemsupplier to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SupplierName string optional. Example: "Example SupplierName"
     * @bodyParam RegistrationNo string optional. Example: "Example RegistrationNo"
     * @bodyParam ContactPerson string optional. Example: "Example ContactPerson"
     * @bodyParam Notes string optional. Example: "Example Notes"
     * @bodyParam Street1 string optional. Example: "Example Street1"
     * @bodyParam Street2 string optional. Example: "Example Street2"
     * @bodyParam City string optional. Example: "Example City"
     * @bodyParam State string optional. Example: "Example State"
     * @bodyParam Country string optional. Example: "Example Country"
     * @bodyParam Postcode string optional. Example: "Example Postcode"
     * @bodyParam ISD string optional. Example: "Example ISD"
     * @bodyParam STD string optional. Example: "Example STD"
     * @bodyParam Phone string optional. Example: "Example Phone"
     * @bodyParam PermanentAddress string optional. Example: "Example PermanentAddress"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam DeletedOn string optional. Example: "Example DeletedOn"
     * @bodyParam DeletedBy string optional. Example: "Example DeletedBy"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "supplier": {
     *                 "item_supplier_id": 1,
     *                 "clinic_id": 1,
     *                 "supplier_name": "Example Name",
     *                 "registration_no": "Example value",
     *                 "contact_person": "Example value",
     *                 "notes": "Example value",
     *                 "street1": "Example value",
     *                 "street2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country": "Example value",
     *                 "postcode": "Example value",
     *                 "isd": "Example value",
     *                 "std": "Example value",
     *                 "phone": "Example value",
     *                 "permanent_address": "Example value",
     *                 "added_on": "Example value",
     *                 "added_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "deleted_on": "Example value",
     *                 "deleted_by": "Example value",
     *                 "is_active": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemSupplierResource
     */
    public function update(UpdateItemSupplierRequest $request, ItemSupplier $itemSupplier)
    {
        try {
            $validatedData = $request->validated();

            $updatedSupplier = $this->supplierService->updateSupplier($itemSupplier, $validatedData);

            return $this->successResponse([
                'message' => 'Item supplier updated successfully',
                'supplier' => new ItemSupplierResource($updatedSupplier)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating item supplier: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update item supplier',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemSupplier
     *
     * @method DELETE
     *
     * Delete a itemsupplier
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the itemsupplier to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemSupplier $itemSupplier)
    {
        //
    }
}
