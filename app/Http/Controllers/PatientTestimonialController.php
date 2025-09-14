<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientTestimonialResource; // Assuming you have a resource for Patient Testimonial
use App\Models\PatientTestimonial;
use App\Services\PatientTestimonialService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientTestimonialRequest; // Assuming you have a request for storing testimonials
use App\Http\Requests\UpdatePatientTestimonialRequest; // Assuming you have a request for updating testimonials
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Testimonial
 * @subgroupDescription PatientTestimonialController handles the CRUD operations for patient testimonial controller.
 */
class PatientTestimonialController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientTestimonialService $patientTestimonialService)
    {
    }

    /**
     * @group PatientTestimonial
     *
     * @method GET
     *
     * List all patienttestimonial
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_testimonials": [
     *                 {
     *                     "testimonial_id": 1,
     *                     "clinic_id": 1,
     *                     "patient_id": 1,
     *                     "patient_name": "Example Name",
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "date_of_testimonial": "Example value",
     *                     "document_id": 1,
     *                     "published_from": "Example value",
     *                     "published_till": "Example value",
     *                     "show_on_tv": "Example value",
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientTestimonialService->getPatientTestimonials($patient, $perPage);

            return $this->successResponse([
                'patient_testimonials' => PatientTestimonialResource::collection($data['patient_testimonials']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Testimonials: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientTestimonial
     *
     * @method POST
     *
     * Create a new patienttestimonial
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientName string required. Example: "Example PatientName"
     * @bodyParam Title string required. Example: "Example Title"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam DateOfTestimonial string required. date. Example: "Example DateOfTestimonial"
     * @bodyParam DocumentID string required. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam PublishedFrom string required. Example: "Example PublishedFrom"
     * @bodyParam PublishedTill string required. Example: "Example PublishedTill"
     * @bodyParam ShowOnTV string required. Example: "Example ShowOnTV"
     * @bodyParam IsDelted string required. Example: "Example IsDelted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "testimonial": {
     *                 "testimonial_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "patient_name": "Example Name",
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "date_of_testimonial": "Example value",
     *                 "document_id": 1,
     *                 "published_from": "Example value",
     *                 "published_till": "Example value",
     *                 "show_on_tv": "Example value",
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
     * @return PatientTestimonialResource
     */
    public function store(StorePatientTestimonialRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $testimonial = $this->patientTestimonialService->createTestimonial($validatedData);

            return $this->successResponse([
                'message' => 'Patient testimonial created successfully',
                'testimonial' => new PatientTestimonialResource($testimonial)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient testimonial: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient testimonial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientTestimonial
     *
     * @method PUT
     *
     * Update an existing patienttestimonial
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienttestimonial to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientName string optional. Example: "Example PatientName"
     * @bodyParam Title string optional. Example: "Example Title"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam DateOfTestimonial string optional. date. Example: "Example DateOfTestimonial"
     * @bodyParam DocumentID string optional. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam PublishedFrom string optional. Example: "Example PublishedFrom"
     * @bodyParam PublishedTill string optional. Example: "Example PublishedTill"
     * @bodyParam ShowOnTV string optional. Example: "Example ShowOnTV"
     * @bodyParam IsDelted string optional. Example: "Example IsDelted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "testimonial": {
     *                 "testimonial_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "patient_name": "Example Name",
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "date_of_testimonial": "Example value",
     *                 "document_id": 1,
     *                 "published_from": "Example value",
     *                 "published_till": "Example value",
     *                 "show_on_tv": "Example value",
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
     * @return PatientTestimonialResource
     */
    public function update(UpdatePatientTestimonialRequest $request, PatientTestimonial $patientTestimonial)
    {
        try {
            $validatedData = $request->validated();

            $updatedTestimonial = $this->patientTestimonialService->updateTestimonial($patientTestimonial, $validatedData);

            return $this->successResponse([
                'message' => 'Patient testimonial updated successfully',
                'testimonial' => new PatientTestimonialResource($updatedTestimonial)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient testimonial: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient testimonial',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
