<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWSCofigGalleryAlbumResource extends JsonResource
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
            'gallery_album_id'   => $this->GalleryAlbumID,
            'clinic_website_id'  => $this->ClinicWebSiteID,
            'album_name'         => $this->AlbumName,
            'album_description'  => $this->AlbumDescription,
            'album_type_id'      => $this->AlbumTypeID,
            'is_deleted'         => $this->IsDeleted,
            'created_on'         => $this->CreatedOn,
            'created_by'         => $this->CreatedBy,
            'last_updated_on'    => $this->LastUpdatedOn,
            'last_updated_by'    => $this->LastUpdatedBy,
        ];
    }
}