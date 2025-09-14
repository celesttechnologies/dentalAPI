<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDOCFolderResource extends JsonResource
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
            'folder_id' => $this->FolderId,
            'clinic_id' => $this->ClinicID,
            'title' => $this->Title,
            'description' => $this->Description,
            'parent_folder_id' => $this->ParentFolderId,
            'folder_type_id' => $this->FolderTypeId,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn ? $this->CreatedOn->format('Y-m-d H:i:s') : null,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn ? $this->LastUpdatedOn->format('Y-m-d H:i:s') : null,
            'folder_path' => $this->FolderPath,
            'partition_id' => $this->PartitionId,
            'row_guid' => $this->RowGuid,
            'folder_type' => $this->FolderType,
            'owner' => $this->Owner,
        ];
    }
}