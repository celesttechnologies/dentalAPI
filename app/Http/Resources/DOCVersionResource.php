<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DOCVersionResource extends JsonResource
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
            'id'                   => $this->ID,
            'document_id'         => $this->DocumentID,
            'version_number'      => $this->VersionNumber,
            'category_id'         => $this->CategoryID,
            'sub_category_id'     => $this->SubCategoryID,
            'status_id'           => $this->StatusID,
            'patient_id'          => $this->PatientID,
            'document_type'       => $this->DocumentType,
            'description'         => $this->Description,
            'created_by'          => $this->CreatedBy,
            'last_updated_on'     => $this->LastUpdatedOn,
            'publish_on'          => $this->PublishOn,
            'expiration_on'       => $this->ExpirationOn,
            'related_version_id'  => $this->RelatedVersionID,
            'related_version_number'=> $this->RelatedVersionNumber,
            'is_deleted'          => $this->IsDeleted,
            'is_expired'          => $this->IsExpired,
            'file_name'           => $this->FileName,
            'uploaded_file_path'  => $this->UploadedFilePath,
            'physical_file_path'  => $this->PhysicalFilePath,
            'ref_id1'             => $this->RefId1,
        ];
    }
}