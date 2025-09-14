<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServerSyncDatumResource extends JsonResource
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
            'server_sync_primary_id' => $this->ServerSyncPrimaryID,
            'clinic_id' => $this->ClinicID,
            'table_name' => $this->TableName,
            'primary_key_column_name' => $this->PrimaryKeyColumnName,
            'primary_key_id' => $this->PrimaryKeyID,
            'row_guid' => $this->rowguid,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'is_created_exported' => $this->IsCreatedExported,
            'is_created_exported_on' => $this->IsCreatedExportedOn,
            'is_last_updated_exported' => $this->IsLastUpdatedExported,
            'is_last_updated_exported_on' => $this->IsLastUpdatedExportedOn,
            'row_data' => $this->RowData,
        ];
    }
}