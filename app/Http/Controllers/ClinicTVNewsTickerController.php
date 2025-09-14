<?php

namespace App\Http\Controllers;

use App\Models\ClinicTVNewsTicker;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicTVNewsTickerService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicTVNewsTickerResource;
use App\Http\Requests\StoreClinicTVNewsTickerRequest;
use App\Http\Requests\UpdateClinicTVNewsTickerRequest;

class ClinicTVNewsTickerController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicTVNewsTickerService $clinicTVNewsTickerService)
    {
    }

    /**
     * @group ClinicTVNewsTicker
     *
     * @method GET
     *
     * List all clinictvnewsticker
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_news_tickers": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "news_ticker_text": "Example value",
     *                     "published_from": "Example value",
     *                     "published_to": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->clinicTVNewsTickerService->getClinicTVNewsTickers($perPage);

            return $this->successResponse([
                'clinic_tv_news_tickers' => ClinicTVNewsTickerResource::collection($data['clinic_tv_news_tickers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic TV news tickers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicTVNewsTicker
     *
     * @method GET
     *
     * Create clinictvnewsticker
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "news_ticker": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "news_ticker_text": "Example value",
     *                 "published_from": "Example value",
     *                 "published_to": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVNewsTickerResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicTVNewsTicker
     *
     * @method POST
     *
     * Create a new clinictvnewsticker
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string required. Example: "Example Title"
     * @bodyParam NewsTickerText string required. Example: "Example NewsTickerText"
     * @bodyParam PublishedFrom string required. Example: "Example PublishedFrom"
     * @bodyParam PublishedTo string required. Example: "Example PublishedTo"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "news_ticker": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "news_ticker_text": "Example value",
     *                 "published_from": "Example value",
     *                 "published_to": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVNewsTickerResource
     */
    public function store(StoreClinicTVNewsTickerRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $newsTicker = $this->clinicTVNewsTickerService->createNewsTicker($validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV News Ticker created successfully',
                'news_ticker' => new ClinicTVNewsTickerResource($newsTicker)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating Clinic TV News Ticker: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create Clinic TV News Ticker',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVNewsTicker
     *
     * @method GET
     *
     * Get a specific clinictvnewsticker
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinictvnewsticker to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "news_ticker": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "news_ticker_text": "Example value",
     *                 "published_from": "Example value",
     *                 "published_to": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVNewsTickerResource
     */
    public function show(ClinicTVNewsTicker $clinicTVNewsTicker)
    {
        //
    }

    /**
     * @group ClinicTVNewsTicker
     *
     * @method GET
     *
     * Edit clinictvnewsticker
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinictvnewsticker to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "news_ticker": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "news_ticker_text": "Example value",
     *                 "published_from": "Example value",
     *                 "published_to": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVNewsTickerResource
     */
    public function edit(ClinicTVNewsTicker $clinicTVNewsTicker)
    {
        //
    }

    /**
     * @group ClinicTVNewsTicker
     *
     * @method PUT
     *
     * Update an existing clinictvnewsticker
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinictvnewsticker to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string optional. Example: "Example Title"
     * @bodyParam NewsTickerText string optional. Example: "Example NewsTickerText"
     * @bodyParam PublishedFrom string optional. Example: "Example PublishedFrom"
     * @bodyParam PublishedTo string optional. Example: "Example PublishedTo"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "news_ticker": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "news_ticker_text": "Example value",
     *                 "published_from": "Example value",
     *                 "published_to": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicTVNewsTickerResource
     */
    public function update(UpdateClinicTVNewsTickerRequest $request, ClinicTVNewsTicker $clinicTVNewsTicker)
    {
        try {
            $validatedData = $request->validated();

            $updatedNewsTicker = $this->clinicTVNewsTickerService->updateNewsTicker($clinicTVNewsTicker, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV News Ticker updated successfully',
                'news_ticker' => new ClinicTVNewsTickerResource($updatedNewsTicker)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating Clinic TV News Ticker: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update Clinic TV News Ticker',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVNewsTicker
     *
     * @method DELETE
     *
     * Delete a clinictvnewsticker
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinictvnewsticker to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicTVNewsTicker $clinicTVNewsTicker)
    {
        //
    }
}
