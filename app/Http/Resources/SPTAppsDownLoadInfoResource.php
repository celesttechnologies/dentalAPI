<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SPTAppsDownLoadInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'download_id' => $this->DownloadID,
            'username' => $this->username,
            'application_type_id' => $this->ApplicationTypeID,
            'downloaded_on' => $this->DownloadedOn,
            'ip_address' => $this->IPAddress,
            'fingerprint' => $this->FingerPrint,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'rowguid' => $this->rowguid,
        ];
    }
}
