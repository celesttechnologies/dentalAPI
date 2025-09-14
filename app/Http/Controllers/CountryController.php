<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CountryService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    use ApiResponse;

    public function __construct(
        private CountryService $countryService
    ) {
    }

    /**
     * @group Country
     *
     * @method GET
     *
     * List all country
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "countries": [
     *                 {
     *                     "id": 1,
     *                     "country_code": "Example value",
     *                     "country_name": "Example Name"
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

            $countryList = $this->countryService->getCountries($perPage);

            return $this->successResponse(['countries' => CountryResource::collection($countryList['countries']), 'pagination' => $countryList['pagination']]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group Country
     *
     * @method GET
     *
     * Create country
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "country": {
     *                 "id": 1,
     *                 "country_code": "Example value",
     *                 "country_name": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CountryResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Country
     *
     * @method POST
     *
     * Create a new country
     *
     * @post /
     *
     * @bodyParam CountryCode string required. Example: "Example CountryCode"
     * @bodyParam CountryName string required. Example: "Example CountryName"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "country": {
     *                 "id": 1,
     *                 "country_code": "Example value",
     *                 "country_name": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CountryResource
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $country = $this->countryService->createCountry($validatedData);

            return $this->successResponse([
                'message' => 'Country created successfully',
                'country' => new CountryResource($country)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating country: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create country',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Country
     *
     * @method GET
     *
     * Get a specific country
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the country to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "country": {
     *                 "id": 1,
     *                 "country_code": "Example value",
     *                 "country_name": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CountryResource
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * @group Country
     *
     * @method GET
     *
     * Edit country
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the country to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "country": {
     *                 "id": 1,
     *                 "country_code": "Example value",
     *                 "country_name": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CountryResource
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * @group Country
     *
     * @method PUT
     *
     * Update an existing country
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the country to update. Example: 1
     *
     * @bodyParam CountryCode string optional. Example: "Example CountryCode"
     * @bodyParam CountryName string optional. Example: "Example CountryName"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "country": {
     *                 "id": 1,
     *                 "country_code": "Example value",
     *                 "country_name": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CountryResource
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        try {
            $validatedData = $request->validated();

            $updatedCountry = $this->countryService->updateCountry($country, $validatedData);

            return $this->successResponse([
                'message' => 'Country updated successfully',
                'country' => new CountryResource($updatedCountry)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating country: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update country',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Country
     *
     * @method DELETE
     *
     * Delete a country
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the country to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
