<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ProviderService;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ProviderResource;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;

class ProviderController extends Controller
{
    use ApiResponse;

    public function __construct(
        private ProviderService $providerService,
        private EmailService $emailService
    ) {
    }

    /**
     * @group Provider
     *
     * @method GET
     *
     * List all provider
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "providers": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "provider_name": "Example Name",
     *                     "location": "Example value",
     *                     "email": "user@example.com",
     *                     "experience": "Example value",
     *                     "is_deleted": true,
     *                     "provider_image": 1,
     *                     "phone_number": "Example value",
     *                     "sequence": "Example value",
     *                     "attribute1": "Example value",
     *                     "attribute2": "Example value",
     *                     "attribute3": "Example value",
     *                     "category": "Example value",
     *                     "registration_number": "Example value",
     *                     "display_in_appointments_view": "Example value",
     *                     "incentive_type": "Example value",
     *                     "incentive_value": "Example value",
     *                     "color_code": "Example value"
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
            $search = $request->query('search');

            $providerList = $this->providerService->getProviders($perPage, $search);

            return $this->successResponse(['providers' => ProviderResource::collection($providerList['providers']), 'pagination' => $providerList['pagination']]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group Provider
     *
     * @method GET
     *
     * Create provider
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "provider_name": "Example Name",
     *                 "location": "Example value",
     *                 "email": "user@example.com",
     *                 "experience": "Example value",
     *                 "is_deleted": true,
     *                 "provider_image": 1,
     *                 "phone_number": "Example value",
     *                 "sequence": "Example value",
     *                 "attribute1": "Example value",
     *                 "attribute2": "Example value",
     *                 "attribute3": "Example value",
     *                 "category": "Example value",
     *                 "registration_number": "Example value",
     *                 "display_in_appointments_view": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "color_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Provider
     *
     * @method POST
     *
     * Create a new provider
     *
     * @post /
     *
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ProviderName string required. Maximum length: 255. Example: "1"
     * @bodyParam Location string required. Example: "Example Location"
     * @bodyParam Email string required. Must be a valid email address. Maximum length: 255. Example: "Example Email"
     * @bodyParam Experience string required. Example: "Example Experience"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam ProviderImage string required. Maximum length: 255. Example: "1"
     * @bodyParam PhoneNumber string required. Example: "Example PhoneNumber"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam Sequence string required. Example: "Example Sequence"
     * @bodyParam Attribute1 string required. Example: "Example Attribute1"
     * @bodyParam Attribute2 string required. Example: "Example Attribute2"
     * @bodyParam Attribute3 string required. Example: "Example Attribute3"
     * @bodyParam Category string required. Example: "Example Category"
     * @bodyParam RegistrationNumber string required. Example: "Example RegistrationNumber"
     * @bodyParam DisplayInAppointmentsView string required. Example: "Example DisplayInAppointmentsView"
     * @bodyParam UserID string required. Maximum length: 255. Example: "Example UserID"
     * @bodyParam IncentiveType string required. Example: "Example IncentiveType"
     * @bodyParam IncentiveValue string required. Example: "Example IncentiveValue"
     * @bodyParam ColorCode string required. Example: "Example ColorCode"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "provider_name": "Example Name",
     *                 "location": "Example value",
     *                 "email": "user@example.com",
     *                 "experience": "Example value",
     *                 "is_deleted": true,
     *                 "provider_image": 1,
     *                 "phone_number": "Example value",
     *                 "sequence": "Example value",
     *                 "attribute1": "Example value",
     *                 "attribute2": "Example value",
     *                 "attribute3": "Example value",
     *                 "category": "Example value",
     *                 "registration_number": "Example value",
     *                 "display_in_appointments_view": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "color_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderResource
     */
    public function store(StoreProviderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $provider = $this->providerService->createProvider($validatedData);

            // Send welcome email to the new provider
            $emailSent = $this->emailService->sendWelcomeEmail($provider);
            
            if (!$emailSent) {
                Log::warning('Welcome email failed to send for provider: ' . $provider->id);
            }

            return $this->successResponse([
                'message' => 'Provider created successfully',
                'provider' => new ProviderResource($provider),
                'email_sent' => $emailSent
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating provider: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create provider',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Provider
     *
     * @method GET
     *
     * Get a specific provider
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the provider to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "provider_name": "Example Name",
     *                 "location": "Example value",
     *                 "email": "user@example.com",
     *                 "experience": "Example value",
     *                 "is_deleted": true,
     *                 "provider_image": 1,
     *                 "phone_number": "Example value",
     *                 "sequence": "Example value",
     *                 "attribute1": "Example value",
     *                 "attribute2": "Example value",
     *                 "attribute3": "Example value",
     *                 "category": "Example value",
     *                 "registration_number": "Example value",
     *                 "display_in_appointments_view": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "color_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderResource
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * @group Provider
     *
     * @method GET
     *
     * Edit provider
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the provider to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "provider_name": "Example Name",
     *                 "location": "Example value",
     *                 "email": "user@example.com",
     *                 "experience": "Example value",
     *                 "is_deleted": true,
     *                 "provider_image": 1,
     *                 "phone_number": "Example value",
     *                 "sequence": "Example value",
     *                 "attribute1": "Example value",
     *                 "attribute2": "Example value",
     *                 "attribute3": "Example value",
     *                 "category": "Example value",
     *                 "registration_number": "Example value",
     *                 "display_in_appointments_view": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "color_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderResource
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * @group Provider
     *
     * @method PUT
     *
     * Update an existing provider
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the provider to update. Example: 1
     *
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ProviderName string optional. Maximum length: 255. Example: "1"
     * @bodyParam Location string optional. Example: "Example Location"
     * @bodyParam Email string optional. Must be a valid email address. Maximum length: 255. Example: "Example Email"
     * @bodyParam Experience string optional. Example: "Example Experience"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam ProviderImage string optional. Maximum length: 255. Example: "1"
     * @bodyParam PhoneNumber string optional. Example: "Example PhoneNumber"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam Sequence string optional. Example: "Example Sequence"
     * @bodyParam Attribute1 string optional. Example: "Example Attribute1"
     * @bodyParam Attribute2 string optional. Example: "Example Attribute2"
     * @bodyParam Attribute3 string optional. Example: "Example Attribute3"
     * @bodyParam Category string optional. Example: "Example Category"
     * @bodyParam RegistrationNumber string optional. Example: "Example RegistrationNumber"
     * @bodyParam DisplayInAppointmentsView string optional. Example: "Example DisplayInAppointmentsView"
     * @bodyParam UserID string optional. Maximum length: 255. Example: "Example UserID"
     * @bodyParam IncentiveType string optional. Example: "Example IncentiveType"
     * @bodyParam IncentiveValue string optional. Example: "Example IncentiveValue"
     * @bodyParam ColorCode string optional. Example: "Example ColorCode"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "provider_name": "Example Name",
     *                 "location": "Example value",
     *                 "email": "user@example.com",
     *                 "experience": "Example value",
     *                 "is_deleted": true,
     *                 "provider_image": 1,
     *                 "phone_number": "Example value",
     *                 "sequence": "Example value",
     *                 "attribute1": "Example value",
     *                 "attribute2": "Example value",
     *                 "attribute3": "Example value",
     *                 "category": "Example value",
     *                 "registration_number": "Example value",
     *                 "display_in_appointments_view": "Example value",
     *                 "incentive_type": "Example value",
     *                 "incentive_value": "Example value",
     *                 "color_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ProviderResource
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        try {
            $validatedData = $request->validated();

            $updatedProvider = $this->providerService->updateProvider($provider, $validatedData);

            return $this->successResponse([
                'message' => 'Provider updated successfully',
                'provider' => new ProviderResource($updatedProvider)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating provider: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update provider',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Provider
     *
     * @method DELETE
     *
     * Delete a provider
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the provider to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
    }
}
