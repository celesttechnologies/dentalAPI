<?php

namespace App\Services;

use App\Models\SPTAppsDownloadInfo;
use App\Http\Resources\SPTAppsDownloadInfoResource;
use Illuminate\Pagination\LengthAwarePaginator;

class SPTAppsDownloadInfoService
{
    /**
     * Get a paginated list of SPT Apps Download Info.
     *
     * @param int $perPage
     * @return array
     */
    public function getSPTAppsDownloadInfo(int $perPage): array
    {
        $data = SPTAppsDownloadInfo::paginate($perPage);

        return [
            'apps_download_info' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new apps download info record.
     *
     * @param array $data The validated data for creating the apps download info
     * @return SPTAppsDownloadInfo The newly created apps download info model
     */
    public function createAppsDownloadInfo(array $data): SPTAppsDownloadInfo
    {
        return SPTAppsDownloadInfo::create($data);
    }

    /**
     * Update an existing apps download info record.
     *
     * @param SPTAppsDownloadInfo $sPTAppsDownloadInfo The apps download info model to update
     * @param array $data The validated data for updating the apps download info
     * @return SPTAppsDownloadInfo The updated apps download info model
     */
    public function updateAppsDownloadInfo(SPTAppsDownloadInfo $sPTAppsDownloadInfo, array $data): SPTAppsDownloadInfo
    {
        $sPTAppsDownloadInfo->update($data);
        return $sPTAppsDownloadInfo;
    }
}
