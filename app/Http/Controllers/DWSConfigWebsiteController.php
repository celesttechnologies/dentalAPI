<?php

namespace App\Http\Controllers;

use App\Models\DWSConfigWebsite;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DWSConfigWebsiteService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DWSConfigWebsiteResource;
use App\Http\Requests\StoreDWSConfigWebsiteRequest;
use App\Http\Requests\UpdateDWSConfigWebsiteRequest;

class DWSConfigWebsiteController extends Controller
{
    use ApiResponse;

    public function __construct(private DWSConfigWebsiteService $websiteConfigService)
    {
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method GET
     *
     * List all dwsconfigwebsite
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "website_configs": [
     *                 {
     *                     "clinic_website_id": 1,
     *                     "clinic_id": 1,
     *                     "clinic_url": "Example value",
     *                     "clinic_name": "Example Name",
     *                     "clinic_description": "Example value",
     *                     "clinic_address": "Example value",
     *                     "city": "Example value",
     *                     "state": "Example value",
     *                     "zip_code": "Example value",
     *                     "phone_number": "Example value",
     *                     "clinic_map_path": "Example value",
     *                     "about_head_doctor": "Example value",
     *                     "default_theme_id": 1,
     *                     "default_language_id": 1,
     *                     "facebook_url": "Example value",
     *                     "linkedin_url": "Example value",
     *                     "twitter_url": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "clinic_logo": "Example value",
     *                     "contact_email": "user@example.com",
     *                     "sub_domain": "Example value"
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

            $data = $this->websiteConfigService->getWebsites($perPage);

            return $this->successResponse([
                'website_configs' => DWSConfigWebsiteResource::collection($data['website_configs']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching website configurations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method GET
     *
     * Create dwsconfigwebsite
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "websiteConfig": {
     *                 "clinic_website_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_url": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_description": "Example value",
     *                 "clinic_address": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "zip_code": "Example value",
     *                 "phone_number": "Example value",
     *                 "clinic_map_path": "Example value",
     *                 "about_head_doctor": "Example value",
     *                 "default_theme_id": 1,
     *                 "default_language_id": 1,
     *                 "facebook_url": "Example value",
     *                 "linkedin_url": "Example value",
     *                 "twitter_url": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "contact_email": "user@example.com",
     *                 "sub_domain": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigWebsiteResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method POST
     *
     * Create a new dwsconfigwebsite
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ClinicURL string required. Example: "Example ClinicURL"
     * @bodyParam ClinicName string required. Example: "Example ClinicName"
     * @bodyParam ClinicDescription string required. Example: "Example ClinicDescription"
     * @bodyParam ClinicAddress string required. Example: "Example ClinicAddress"
     * @bodyParam City string required. Example: "Example City"
     * @bodyParam State string required. Example: "Example State"
     * @bodyParam ZipCode string required. Example: "Example ZipCode"
     * @bodyParam PhoneNumber string required. Example: "Example PhoneNumber"
     * @bodyParam ClinicMapPath string required. Example: "Example ClinicMapPath"
     * @bodyParam AboutHeadDoctor string required. Example: "Example AboutHeadDoctor"
     * @bodyParam DefaultThemeID string required. Maximum length: 255. Example: "Example DefaultThemeID"
     * @bodyParam DefaultLanguageID string required. Maximum length: 255. Example: "Example DefaultLanguageID"
     * @bodyParam FacebookURL string required. Example: "Example FacebookURL"
     * @bodyParam LinkedInURL string required. Example: "Example LinkedInURL"
     * @bodyParam TwitterURL string required. Example: "Example TwitterURL"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam ClinicLogo string required. Example: "Example ClinicLogo"
     * @bodyParam ContactEmail string required. Must be a valid email address. Maximum length: 255. Example: "Example ContactEmail"
     * @bodyParam SubDomain string required. Example: "Example SubDomain"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "websiteConfig": {
     *                 "clinic_website_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_url": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_description": "Example value",
     *                 "clinic_address": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "zip_code": "Example value",
     *                 "phone_number": "Example value",
     *                 "clinic_map_path": "Example value",
     *                 "about_head_doctor": "Example value",
     *                 "default_theme_id": 1,
     *                 "default_language_id": 1,
     *                 "facebook_url": "Example value",
     *                 "linkedin_url": "Example value",
     *                 "twitter_url": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "contact_email": "user@example.com",
     *                 "sub_domain": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigWebsiteResource
     */
    public function store(StoreDWSConfigWebsiteRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $websiteConfig = $this->websiteConfigService->createWebsiteConfig($validatedData);

            return $this->successResponse([
                'message' => 'Website configuration created successfully',
                'websiteConfig' => new DWSConfigWebsiteResource($websiteConfig)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating website configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create website configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method GET
     *
     * Get a specific dwsconfigwebsite
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigwebsite to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "websiteConfig": {
     *                 "clinic_website_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_url": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_description": "Example value",
     *                 "clinic_address": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "zip_code": "Example value",
     *                 "phone_number": "Example value",
     *                 "clinic_map_path": "Example value",
     *                 "about_head_doctor": "Example value",
     *                 "default_theme_id": 1,
     *                 "default_language_id": 1,
     *                 "facebook_url": "Example value",
     *                 "linkedin_url": "Example value",
     *                 "twitter_url": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "contact_email": "user@example.com",
     *                 "sub_domain": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigWebsiteResource
     */
    public function show(DWSConfigWebsite $dWSConfigWebsite)
    {
        //
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method GET
     *
     * Edit dwsconfigwebsite
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the dwsconfigwebsite to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "websiteConfig": {
     *                 "clinic_website_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_url": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_description": "Example value",
     *                 "clinic_address": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "zip_code": "Example value",
     *                 "phone_number": "Example value",
     *                 "clinic_map_path": "Example value",
     *                 "about_head_doctor": "Example value",
     *                 "default_theme_id": 1,
     *                 "default_language_id": 1,
     *                 "facebook_url": "Example value",
     *                 "linkedin_url": "Example value",
     *                 "twitter_url": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "contact_email": "user@example.com",
     *                 "sub_domain": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigWebsiteResource
     */
    public function edit(DWSConfigWebsite $dWSConfigWebsite)
    {
        //
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method PUT
     *
     * Update an existing dwsconfigwebsite
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigwebsite to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ClinicURL string optional. Example: "Example ClinicURL"
     * @bodyParam ClinicName string optional. Example: "Example ClinicName"
     * @bodyParam ClinicDescription string optional. Example: "Example ClinicDescription"
     * @bodyParam ClinicAddress string optional. Example: "Example ClinicAddress"
     * @bodyParam City string optional. Example: "Example City"
     * @bodyParam State string optional. Example: "Example State"
     * @bodyParam ZipCode string optional. Example: "Example ZipCode"
     * @bodyParam PhoneNumber string optional. Example: "Example PhoneNumber"
     * @bodyParam ClinicMapPath string optional. Example: "Example ClinicMapPath"
     * @bodyParam AboutHeadDoctor string optional. Example: "Example AboutHeadDoctor"
     * @bodyParam DefaultThemeID string optional. Maximum length: 255. Example: "Example DefaultThemeID"
     * @bodyParam DefaultLanguageID string optional. Maximum length: 255. Example: "Example DefaultLanguageID"
     * @bodyParam FacebookURL string optional. Example: "Example FacebookURL"
     * @bodyParam LinkedInURL string optional. Example: "Example LinkedInURL"
     * @bodyParam TwitterURL string optional. Example: "Example TwitterURL"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam ClinicLogo string optional. Example: "Example ClinicLogo"
     * @bodyParam ContactEmail string optional. Must be a valid email address. Maximum length: 255. Example: "Example ContactEmail"
     * @bodyParam SubDomain string optional. Example: "Example SubDomain"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "websiteConfig": {
     *                 "clinic_website_id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_url": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_description": "Example value",
     *                 "clinic_address": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "zip_code": "Example value",
     *                 "phone_number": "Example value",
     *                 "clinic_map_path": "Example value",
     *                 "about_head_doctor": "Example value",
     *                 "default_theme_id": 1,
     *                 "default_language_id": 1,
     *                 "facebook_url": "Example value",
     *                 "linkedin_url": "Example value",
     *                 "twitter_url": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "contact_email": "user@example.com",
     *                 "sub_domain": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigWebsiteResource
     */
    public function update(UpdateDWSConfigWebsiteRequest $request, DWSConfigWebsite $dWSConfigWebsite)
    {
        try {
            $validatedData = $request->validated();

            $updatedWebsiteConfig = $this->websiteConfigService->updateWebsiteConfig($dWSConfigWebsite, $validatedData);

            return $this->successResponse([
                'message' => 'Website configuration updated successfully',
                'websiteConfig' => new DWSConfigWebsiteResource($updatedWebsiteConfig)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating website configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update website configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigWebsite
     *
     * @method DELETE
     *
     * Delete a dwsconfigwebsite
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigwebsite to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DWSConfigWebsite $dWSConfigWebsite)
    {
        //
    }
}
