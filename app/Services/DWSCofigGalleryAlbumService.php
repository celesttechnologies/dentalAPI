<?php

namespace App\Services;

use App\Models\DWSCofigGalleryAlbum;
use App\Http\Resources\DWSCofigGalleryAlbumResource;

class DWSCofigGalleryAlbumService
{
    /**
     * Get a paginated list of gallery albums.
     *
     * @param int $perPage
     * @return array
     */
    public function getGalleryAlbums(int $perPage): array
    {
        // Fetch paginated data from the DWSCofigGalleryAlbum model
        $data = DWSCofigGalleryAlbum::paginate($perPage);

        return [
            'gallery_albums' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new gallery album record.
     *
     * @param array $data The validated data for creating the gallery album
     * @return DWSCofigGalleryAlbum The newly created gallery album model
     */
    public function createGalleryAlbum(array $data): DWSCofigGalleryAlbum
    {
        return DWSCofigGalleryAlbum::create($data);
    }

    /**
     * Update an existing gallery album record.
     *
     * @param DWSCofigGalleryAlbum $dWSCofigGalleryAlbum The gallery album model to update
     * @param array $data The validated data for updating the gallery album
     * @return DWSCofigGalleryAlbum The updated gallery album model
     */
    public function updateGalleryAlbum(DWSCofigGalleryAlbum $dWSCofigGalleryAlbum, array $data): DWSCofigGalleryAlbum
    {
        $dWSCofigGalleryAlbum->update($data);
        return $dWSCofigGalleryAlbum;
    }
}
