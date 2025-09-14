<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWSConfigGalleryAlbumsFileResource extends JsonResource
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
            'album_file_id'        => $this->AlbumFileID,
            'gallery_album_id'     => $this->GalleryAlbumID,
            'file_name'            => $this->FileName,
            'uploaded_on'          => $this->UploadedOn,
            'file_uploaded_name_as' => $this->FileUploadedNameAs,
        ];
    }
}