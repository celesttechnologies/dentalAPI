<?php

namespace App\Http\Controllers;

use App\Models\DWSCofigGalleryAlbum;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DWSCofigGalleryAlbumService;
use App\Http\Requests\StoreDWSCofigGalleryAlbumRequest;
use App\Http\Requests\UpdateDWSCofigGalleryAlbumRequest;
use App\Http\Resources\DWSCofigGalleryAlbumResource;
use Illuminate\Support\Facades\Log;

class DWSCofigGalleryAlbumController extends Controller
{
    use ApiResponse;

    public function __construct(private DWSCofigGalleryAlbumService $galleryAlbumService)
    {
    }

    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method GET
     *
     * List all dwscofiggalleryalbum
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_albums": [
     *                 {
     *                     "gallery_album_id": 1,
     *                     "clinic_website_id": 1,
     *                     "album_name": "Example Name",
     *                     "album_description": "Example value",
     *                     "album_type_id": 1,
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->galleryAlbumService->getGalleryAlbums($perPage);

            return $this->successResponse([
                'gallery_albums' => DWSCofigGalleryAlbumResource::collection($data['gallery_albums']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching gallery albums: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method GET
     *
     * Create dwscofiggalleryalbum
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_album": {
     *                 "gallery_album_id": 1,
     *                 "clinic_website_id": 1,
     *                 "album_name": "Example Name",
     *                 "album_description": "Example value",
     *                 "album_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSCofigGalleryAlbumResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method POST
     *
     * Create a new dwscofiggalleryalbum
     *
     * @post /
     *
     * @bodyParam ClinicWebSiteID string required. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam AlbumName string required. Example: "Example AlbumName"
     * @bodyParam AlbumDescription string required. Example: "Example AlbumDescription"
     * @bodyParam AlbumTypeID string required. Maximum length: 255. Example: "Example AlbumTypeID"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_album": {
     *                 "gallery_album_id": 1,
     *                 "clinic_website_id": 1,
     *                 "album_name": "Example Name",
     *                 "album_description": "Example value",
     *                 "album_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSCofigGalleryAlbumResource
     */
    public function store(StoreDWSCofigGalleryAlbumRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $galleryAlbum = $this->galleryAlbumService->createGalleryAlbum($validatedData);

            return $this->successResponse([
                'message' => 'Gallery album created successfully',
                'gallery_album' => new DWSCofigGalleryAlbumResource($galleryAlbum)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating gallery album: ' . $e->getMessage());
            return $this->errorResponse([
                'message' => 'Failed to create gallery album. Please try again.'
            ], 500);
        }
    }

    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method GET
     *
     * Get a specific dwscofiggalleryalbum
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the dwscofiggalleryalbum to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_album": {
     *                 "gallery_album_id": 1,
     *                 "clinic_website_id": 1,
     *                 "album_name": "Example Name",
     *                 "album_description": "Example value",
     *                 "album_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSCofigGalleryAlbumResource
     */
    public function show(DWSCofigGalleryAlbum $dWSCofigGalleryAlbum)
    {
        //
    }

    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method GET
     *
     * Edit dwscofiggalleryalbum
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the dwscofiggalleryalbum to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_album": {
     *                 "gallery_album_id": 1,
     *                 "clinic_website_id": 1,
     *                 "album_name": "Example Name",
     *                 "album_description": "Example value",
     *                 "album_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSCofigGalleryAlbumResource
     */
    public function edit(DWSCofigGalleryAlbum $dWSCofigGalleryAlbum)
    {
        //
    }

    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method PUT
     *
     * Update an existing dwscofiggalleryalbum
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the dwscofiggalleryalbum to update. Example: 1
     *
     * @bodyParam ClinicWebSiteID string optional. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam AlbumName string optional. Example: "Example AlbumName"
     * @bodyParam AlbumDescription string optional. Example: "Example AlbumDescription"
     * @bodyParam AlbumTypeID string optional. Maximum length: 255. Example: "Example AlbumTypeID"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "gallery_album": {
     *                 "gallery_album_id": 1,
     *                 "clinic_website_id": 1,
     *                 "album_name": "Example Name",
     *                 "album_description": "Example value",
     *                 "album_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSCofigGalleryAlbumResource
     */
    public function update(UpdateDWSCofigGalleryAlbumRequest $request, DWSCofigGalleryAlbum $dWSCofigGalleryAlbum)
    {
        try {
            $validatedData = $request->validated();

            $dWSCofigGalleryAlbum = $this->galleryAlbumService->updateGalleryAlbum($dWSCofigGalleryAlbum, $validatedData);

            return $this->successResponse([
                'message' => 'Gallery album updated successfully',
                'gallery_album' => new DWSCofigGalleryAlbumResource($dWSCofigGalleryAlbum)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating gallery album: ' . $e->getMessage());
            return $this->errorResponse([
                'message' => 'Failed to update gallery album. Please try again.'
            ], 500);
        }
    }

    /**
     * @group DWSCofigGalleryAlbum
     *
     * @method DELETE
     *
     * Delete a dwscofiggalleryalbum
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the dwscofiggalleryalbum to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DWSCofigGalleryAlbum $dWSCofigGalleryAlbum)
    {
        //
    }
}
