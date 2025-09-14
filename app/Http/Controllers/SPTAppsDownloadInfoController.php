<?php

namespace App\Http\Controllers;

use App\Http\Resources\SPTAppsDownloadInfoResource;
use App\Models\SPTAppsDownloadInfo;
use App\Services\SPTAppsDownloadInfoService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;

class SPTAppsDownloadInfoController extends Controller
{
    use ApiResponse;

    public function __construct(private SPTAppsDownloadInfoService $sptAppsDownloadInfoService)
    {
    }

    /**
     * @group SPTAppsDownloadInfo
     *
     * @method GET
     *
     * List all sptappsdownloadinfo
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "apps_download_info": [
     *                 []
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
            $data = $this->sptAppsDownloadInfoService->getSPTAppsDownloadInfo($perPage);

            return $this->successResponse([
                'apps_download_info' => SPTAppsDownloadInfoResource::collection($data['apps_download_info']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching app download info: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @group SPTAppsDownloadInfo
     *
     * @method GET
     *
     * Create sptappsdownloadinfo
     *
     * @get /create
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @group SPTAppsDownloadInfo
     *
     * @method POST
     *
     * Create a new sptappsdownloadinfo
     *
     * @post /
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @group SPTAppsDownloadInfo
     *
     * @method GET
     *
     * Get a specific sptappsdownloadinfo
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the sptappsdownloadinfo to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SPTAppsDownloadInfo $sPTAppsDownloadInfo)
    {
        //
    }

    /**
     * @group SPTAppsDownloadInfo
     *
     * @method GET
     *
     * Edit sptappsdownloadinfo
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the sptappsdownloadinfo to use. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SPTAppsDownloadInfo $sPTAppsDownloadInfo)
    {
        //
    }

    /**
     * @group SPTAppsDownloadInfo
     *
     * @method PUT
     *
     * Update an existing sptappsdownloadinfo
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the sptappsdownloadinfo to update. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SPTAppsDownloadInfo $sPTAppsDownloadInfo)
    {
        //
    }

    /**
     * @group SPTAppsDownloadInfo
     *
     * @method DELETE
     *
     * Delete a sptappsdownloadinfo
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the sptappsdownloadinfo to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SPTAppsDownloadInfo $sPTAppsDownloadInfo)
    {
        //
    }
}
