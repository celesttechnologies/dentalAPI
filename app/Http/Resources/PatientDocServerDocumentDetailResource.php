<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDocServerDocumentDetailResource extends JsonResource
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
            'id' => $this->Id,
            'clinic_id' => $this->ClinicID,
            'partition_id' => $this->PartitionID,
            'title' => $this->Title,
            'description' => $this->Description,
            'folder_path' => $this->FolderPath,
            'absolute_path' => $this->AbsolutePath,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn ? $this->CreatedOn->format('Y-m-d H:i:s') : null,
            'owner' => $this->Owner,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn ? $this->LastUpdatedOn->format('Y-m-d H:i:s') : null,
            'row_guid' => $this->RowGuid,
        ];
    }
}