<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDOCFileResource extends JsonResource
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
            'id' => $this->ID,
            'patient_id' => $this->PatientID,
            'clinic_id' => $this->ClinicID,
            'document_id' => $this->DocumentID,
            'version_number' => $this->VersionNumber,
            'related_version_id' => $this->RelatedVersionID,
            'related_version_number' => $this->RelatedVersionNumber,
            'folder_id' => $this->FolderId,
            'status_id' => $this->StatusID,
            'description' => $this->Description,
            'file_name' => $this->FileName,
            'virtual_file_path' => $this->VirtualFilePath,
            'physical_file_path' => $this->PhysicalFilePath,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn ? $this->CreatedOn->format('Y-m-d H:i:s') : null,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn ? $this->LastUpdatedOn->format('Y-m-d H:i:s') : null,
            'is_deleted' => $this->IsDeleted,
            'publish_on' => $this->PublishOn ? $this->PublishOn->format('Y-m-d H:i:s') : null,
            'expiration_on' => $this->ExpirationOn ? $this->ExpirationOn->format('Y-m-d H:i:s') : null,
            'ref_id' => $this->RefId,
            'ref_id1' => $this->RefId1,
            'file_size' => $this->FileSize,
            'file_type' => $this->FileType,
            'uploaded_file_name' => $this->UploadedFileName,
            'file_thumb_image' => $this->FileThumbImage,
            'reference_no' => $this->ReferenceNo,
            'row_guid' => $this->rowguid,
        ];
    }
}