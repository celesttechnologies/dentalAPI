<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServerSyncTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'server_table_sync_id' => $this->ServerTableSyncID,
            'table_name' => $this->TableName,
            'primary_key' => $this->PrimaryKey,
            'is_to_be_sync' => $this->IsTobeSync,
            'sync_order' => $this->SyncOrder,
            'is_deleted' => $this->IsDeleted,
            'last_sync_time' => $this->LastSyncTime,
            'last_status_message' => $this->LastStatusMessage,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'clinic_id' => $this->ClinicID,
        ];
    }
}