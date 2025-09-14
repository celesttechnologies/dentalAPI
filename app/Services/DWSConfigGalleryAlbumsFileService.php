<?php

namespace App\Services;

use App\Models\DWSConfigGalleryAlbumsFile;
use App\Http\Resources\DWSConfigGalleryAlbumsFileResource;

class DWSConfigGalleryAlbumsFileService
{
    /**
     * Get a paginated list of gallery albums files.
     *
     * @param int $perPage
     * @return array
     */
    public function getGalleryAlbumsFiles(int $perPage): array
    {
        // Fetch paginated data from the DWSConfigGalleryAlbumsFile model
        $data = DWSConfigGalleryAlbumsFile::paginate($perPage);

        return [
            'gallery_albums_files' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new gallery albums file record.
     *
     * @param array $data The validated data for creating the gallery albums file
     * @return DWSConfigGalleryAlbumsFile The newly created gallery albums file model
     */
    public function createGalleryAlbumsFile(array $data): DWSConfigGalleryAlbumsFile
    {
        return DWSConfigGalleryAlbumsFile::create($data);
    }

    /**
     * Update an existing gallery albums file record.
     *
     * @param DWSConfigGalleryAlbumsFile $dWSConfigGalleryAlbumsFile The gallery albums file model to update
     * @param array $data The validated data for updating the gallery albums file
     * @return DWSConfigGalleryAlbumsFile The updated gallery albums file model
     */
    public function updateGalleryAlbumsFile(DWSConfigGalleryAlbumsFile $dWSConfigGalleryAlbumsFile, array $data): DWSConfigGalleryAlbumsFile
    {
        $dWSConfigGalleryAlbumsFile->update($data);
        return $dWSConfigGalleryAlbumsFile;
    }
}
