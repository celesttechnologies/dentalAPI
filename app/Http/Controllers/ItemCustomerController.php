<?php

namespace App\Http\Controllers;

use App\Models\ItemCustomer;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemCustomerService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemCustomerResource;
use App\Http\Requests\StoreItemCustomerRequest;
use App\Http\Requests\UpdateItemCustomerRequest;

class ItemCustomerController extends Controller
{
    use ApiResponse;

    public function __construct(private ItemCustomerService $customerService)
    {
    }

    /**
     * @group ItemCustomer
     *
     * @method GET
     *
     * List all itemcustomer
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_customers": [
     *                 {
     *                     "item_customer_id": 1,
     *                     "clinic_id": 1,
     *                     "customer_name": "Example Name",
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
            $data = $this->customerService->getItemCustomers($perPage);

            return $this->successResponse([
                'item_customers' => ItemCustomerResource::collection($data['customers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Item Customers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ItemCustomer
     *
     * @method GET
     *
     * Create itemcustomer
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "customer": {
     *                 "item_customer_id": 1,
     *                 "clinic_id": 1,
     *                 "customer_name": "Example Name",
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
     * @return ItemCustomerResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ItemCustomer
     *
     * @method POST
     *
     * Create a new itemcustomer
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam CustomerName string required. Example: "Example CustomerName"
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
     *             "customer": {
     *                 "item_customer_id": 1,
     *                 "clinic_id": 1,
     *                 "customer_name": "Example Name",
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
     * @return ItemCustomerResource
     */
    public function store(StoreItemCustomerRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $customer = $this->customerService->createCustomer($validatedData);

            return $this->successResponse([
                'message' => 'Item customer created successfully',
                'customer' => new ItemCustomerResource($customer)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating item customer: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create item customer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemCustomer
     *
     * @method GET
     *
     * Get a specific itemcustomer
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the itemcustomer to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "customer": {
     *                 "item_customer_id": 1,
     *                 "clinic_id": 1,
     *                 "customer_name": "Example Name",
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
     * @return ItemCustomerResource
     */
    public function show(ItemCustomer $itemCustomer)
    {
        //
    }

    /**
     * @group ItemCustomer
     *
     * @method GET
     *
     * Edit itemcustomer
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the itemcustomer to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "customer": {
     *                 "item_customer_id": 1,
     *                 "clinic_id": 1,
     *                 "customer_name": "Example Name",
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
     * @return ItemCustomerResource
     */
    public function edit(ItemCustomer $itemCustomer)
    {
        //
    }

    /**
     * @group ItemCustomer
     *
     * @method PUT
     *
     * Update an existing itemcustomer
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the itemcustomer to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam CustomerName string optional. Example: "Example CustomerName"
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
     *             "customer": {
     *                 "item_customer_id": 1,
     *                 "clinic_id": 1,
     *                 "customer_name": "Example Name",
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
     * @return ItemCustomerResource
     */
    public function update(UpdateItemCustomerRequest $request, ItemCustomer $itemCustomer)
    {
        try {
            $validatedData = $request->validated();

            $updatedCustomer = $this->customerService->updateCustomer($itemCustomer, $validatedData);

            return $this->successResponse([
                'message' => 'Item customer updated successfully',
                'customer' => new ItemCustomerResource($updatedCustomer)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating item customer: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update item customer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemCustomer
     *
     * @method DELETE
     *
     * Delete a itemcustomer
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the itemcustomer to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCustomer $itemCustomer)
    {
        //
    }
}
