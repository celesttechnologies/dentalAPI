<?php

namespace App\Http\Controllers;

use App\Models\DWSConfigGalleryAlbumsFile;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DWSConfigGalleryAlbumsFileService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DWSConfigGalleryAlbumsFileResource;
use App\Http\Requests\StoreDWSConfigGalleryAlbumsFileRequest;
use App\Http\Requests\UpdateDWSConfigGalleryAlbumsFileRequest;

class DWSConfigGalleryAlbumsFileController extends Controller
{
    use ApiResponse;

    public function __construct(private DWSConfigGalleryAlbumsFileService $galleryAlbumsFileService)
    {
    }

    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method GET
     *
     * List all dwsconfiggalleryalbumsfile
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_albums_files": [
     *                 {
     *                     "album_file_id": 1,
     *                     "gallery_album_id": 1,
     *                     "file_name": "Example Name",
     *                     "uploaded_on": "Example value",
     *                     "file_uploaded_name_as": "Example Name"
     *                 }
     *             ],
     *             "pagination": {
     *                 "current_page": 1,
     *                 "per_pages": 50,
     *                 "total": 100
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));

            $data = $this->galleryAlbumsFileService->getGalleryAlbumsFiles($perPage);

            return $this->successResponse([
                'gallery_albums_files' => DWSConfigGalleryAlbumsFileResource::collection($data['gallery_albums_files']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching gallery albums files: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method GET
     *
     * Create dwsconfiggalleryalbumsfile
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "album_file": {
     *                 "album_file_id": 1,
     *                 "gallery_album_id": 1,
     *                 "file_name": "Example Name",
     *                 "uploaded_on": "Example value",
     *                 "file_uploaded_name_as": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigGalleryAlbumsFileResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method POST
     *
     * Create a new dwsconfiggalleryalbumsfile
     *
     * @post /
     *
     * @bodyParam GalleryAlbumID string required. Maximum length: 255. Example: "Example GalleryAlbumID"
     * @bodyParam FileName string required. Example: "Example FileName"
     * @bodyParam UploadedOn string required. Example: "Example UploadedOn"
     * @bodyParam FileUploadedNameAs string required. Example: "Example FileUploadedNameAs"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "album_file": {
     *                 "album_file_id": 1,
     *                 "gallery_album_id": 1,
     *                 "file_name": "Example Name",
     *                 "uploaded_on": "Example value",
     *                 "file_uploaded_name_as": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigGalleryAlbumsFileResource
     */
    public function store(StoreDWSConfigGalleryAlbumsFileRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $albumFile = $this->galleryAlbumsFileService->createGalleryAlbumsFile($validatedData);

            return $this->successResponse([
                'message' => 'Gallery Album File created successfully',
                'album_file' => new DWSConfigGalleryAlbumsFileResource($albumFile)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating Gallery Album File: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create Gallery Album File',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method GET
     *
     * Get a specific dwsconfiggalleryalbumsfile
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfiggalleryalbumsfile to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "album_file": {
     *                 "album_file_id": 1,
     *                 "gallery_album_id": 1,
     *                 "file_name": "Example Name",
     *                 "uploaded_on": "Example value",
     *                 "file_uploaded_name_as": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigGalleryAlbumsFileResource
     */
    public function show(DWSConfigGalleryAlbumsFile $dWSConfigGalleryAlbumsFile)
    {
        //
    }

    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method GET
     *
     * Edit dwsconfiggalleryalbumsfile
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the dwsconfiggalleryalbumsfile to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "album_file": {
     *                 "album_file_id": 1,
     *                 "gallery_album_id": 1,
     *                 "file_name": "Example Name",
     *                 "uploaded_on": "Example value",
     *                 "file_uploaded_name_as": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigGalleryAlbumsFileResource
     */
    public function edit(DWSConfigGalleryAlbumsFile $dWSConfigGalleryAlbumsFile)
    {
        //
    }

    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method PUT
     *
     * Update an existing dwsconfiggalleryalbumsfile
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfiggalleryalbumsfile to update. Example: 1
     *
     * @bodyParam GalleryAlbumID string optional. Maximum length: 255. Example: "Example GalleryAlbumID"
     * @bodyParam FileName string optional. Example: "Example FileName"
     * @bodyParam UploadedOn string optional. Example: "Example UploadedOn"
     * @bodyParam FileUploadedNameAs string optional. Example: "Example FileUploadedNameAs"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "album_file": {
     *                 "album_file_id": 1,
     *                 "gallery_album_id": 1,
     *                 "file_name": "Example Name",
     *                 "uploaded_on": "Example value",
     *                 "file_uploaded_name_as": "Example Name"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigGalleryAlbumsFileResource
     */
    public function update(UpdateDWSConfigGalleryAlbumsFileRequest $request, DWSConfigGalleryAlbumsFile $dWSConfigGalleryAlbumsFile)
    {
        try {
            $validatedData = $request->validated();

            $updatedAlbumFile = $this->galleryAlbumsFileService->updateGalleryAlbumsFile($dWSConfigGalleryAlbumsFile, $validatedData);

            return $this->successResponse([
                'message' => 'Gallery Album File updated successfully',
                'album_file' => new DWSConfigGalleryAlbumsFileResource($updatedAlbumFile)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating Gallery Album File: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update Gallery Album File',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigGalleryAlbumsFile
     *
     * @method DELETE
     *
     * Delete a dwsconfiggalleryalbumsfile
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfiggalleryalbumsfile to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DWSConfigGalleryAlbumsFile $dWSConfigGalleryAlbumsFile)
    {
        //
    }
}
