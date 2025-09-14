<?php

namespace App\Http\Controllers;

use App\Models\ClinicTVConfiguration;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicTVConfigurationService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicTVConfigurationResource;
use App\Http\Requests\StoreClinicTVConfigurationRequest;
use App\Http\Requests\UpdateClinicTVConfigurationRequest;

class ClinicTVConfigurationController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicTVConfigurationService $clinicTVConfigurationService)
    {
    }

    /**
     * @group ClinicTVConfiguration
     *
     * @method GET
     *
     * List all clinictvconfiguration
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_configurations": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "clinic_name": "Example Name",
     *                     "location": "Example value",
     *                     "custom_text_1": "Example value",
     *                     "custom_text_2": "Example value",
     *                     "logo_path": "Example value",
     *                     "clinic_logo": "Example value",
     *                     "main_screen_display_path": "Example value",
     *                     "side_screen_display_path": 1,
     *                     "video_display_path": 1,
     *                     "appointment_display_flag": "Example value",
     *                     "screen_display_flag": "Example value",
     *                     "testimonial_display_flag": "Example value",
     *                     "side_screen_display_flag": 1,
     *                     "media_screen_display_flag": "Example value",
     *                     "appointment_display_time_period": "Example value",
     *                     "screen_display_time_period": "Example value",
     *                     "testimonial_display_time_period": "Example value",
     *                     "side_screen_display_time_period": 1,
     *                     "no_of_screens_per_cycle": "Example value",
     *                     "no_of_testimonials_per_cycle": "Example value",
     *                     "no_of_media_per_cycle": "Example value",
     *                     "is_newsticker_display": true,
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

            $data = $this->clinicTVConfigurationService->getClinicTVConfigurations($perPage);

            return $this->successResponse([
                'clinic_tv_configurations' => ClinicTVConfigurationResource::collection($data['clinic_tv_configurations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic TV configurations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicTVConfiguration
     *
     * @method GET
     *
     * Create clinictvconfiguration
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_configuration": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "location": "Example value",
     *                 "custom_text_1": "Example value",
     *                 "custom_text_2": "Example value",
     *                 "logo_path": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "main_screen_display_path": "Example value",
     *                 "side_screen_display_path": 1,
     *                 "video_display_path": 1,
     *                 "appointment_display_flag": "Example value",
     *                 "screen_display_flag": "Example value",
     *                 "testimonial_display_flag": "Example value",
     *                 "side_screen_display_flag": 1,
     *                 "media_screen_display_flag": "Example value",
     *                 "appointment_display_time_period": "Example value",
     *                 "screen_display_time_period": "Example value",
     *                 "testimonial_display_time_period": "Example value",
     *                 "side_screen_display_time_period": 1,
     *                 "no_of_screens_per_cycle": "Example value",
     *                 "no_of_testimonials_per_cycle": "Example value",
     *                 "no_of_media_per_cycle": "Example value",
     *                 "is_newsticker_display": true,
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
     * @return ClinicTVConfigurationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicTVConfiguration
     *
     * @method POST
     *
     * Create a new clinictvconfiguration
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ClinicName string required. Example: "Example ClinicName"
     * @bodyParam Location string required. Example: "Example Location"
     * @bodyParam CustomText1 string required. Example: "Example CustomText1"
     * @bodyParam CustomText2 string required. Example: "Example CustomText2"
     * @bodyParam LogoPath string required. Example: "Example LogoPath"
     * @bodyParam ClinicLogo string required. Example: "Example ClinicLogo"
     * @bodyParam MainScreenDisplayPath string required. Example: "Example MainScreenDisplayPath"
     * @bodyParam SideScreenDisplayPath string required. Maximum length: 255. Example: "1"
     * @bodyParam VideoDisplayPath string required. Maximum length: 255. Example: "1"
     * @bodyParam AppointmentDisplayFlag string required. Example: "Example AppointmentDisplayFlag"
     * @bodyParam ScreenDisplayFlag string required. Example: "Example ScreenDisplayFlag"
     * @bodyParam TestimonialDisplayFlag string required. Example: "Example TestimonialDisplayFlag"
     * @bodyParam SideScreenDisplayFlag string required. Maximum length: 255. Example: "1"
     * @bodyParam MediaScreenDisplayFlag string required. Example: "Example MediaScreenDisplayFlag"
     * @bodyParam AppointmentDisplayTimePeriod string required. Example: "Example AppointmentDisplayTimePeriod"
     * @bodyParam ScreenDisplayTimePeriod string required. Example: "Example ScreenDisplayTimePeriod"
     * @bodyParam TestimonialDisplayTimePeriod string required. Example: "Example TestimonialDisplayTimePeriod"
     * @bodyParam SideScreenDisplayTimePeriod string required. Maximum length: 255. Example: "1"
     * @bodyParam NoOfScreensPerCycle string required. Example: "Example NoOfScreensPerCycle"
     * @bodyParam NoOfTestimonialPerCycle string required. Example: "Example NoOfTestimonialPerCycle"
     * @bodyParam NoOfMediaPerCycle string required. Example: "Example NoOfMediaPerCycle"
     * @bodyParam IsNewstickerDisplay string required. Example: "Example IsNewstickerDisplay"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_configuration": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "location": "Example value",
     *                 "custom_text_1": "Example value",
     *                 "custom_text_2": "Example value",
     *                 "logo_path": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "main_screen_display_path": "Example value",
     *                 "side_screen_display_path": 1,
     *                 "video_display_path": 1,
     *                 "appointment_display_flag": "Example value",
     *                 "screen_display_flag": "Example value",
     *                 "testimonial_display_flag": "Example value",
     *                 "side_screen_display_flag": 1,
     *                 "media_screen_display_flag": "Example value",
     *                 "appointment_display_time_period": "Example value",
     *                 "screen_display_time_period": "Example value",
     *                 "testimonial_display_time_period": "Example value",
     *                 "side_screen_display_time_period": 1,
     *                 "no_of_screens_per_cycle": "Example value",
     *                 "no_of_testimonials_per_cycle": "Example value",
     *                 "no_of_media_per_cycle": "Example value",
     *                 "is_newsticker_display": true,
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
     * @return ClinicTVConfigurationResource
     */
    public function store(StoreClinicTVConfigurationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $configuration = $this->clinicTVConfigurationService->createClinicTVConfiguration($validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV configuration created successfully',
                'clinic_tv_configuration' => new ClinicTVConfigurationResource($configuration)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic TV configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic TV configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVConfiguration
     *
     * @method GET
     *
     * Get a specific clinictvconfiguration
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinictvconfiguration to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_configuration": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "location": "Example value",
     *                 "custom_text_1": "Example value",
     *                 "custom_text_2": "Example value",
     *                 "logo_path": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "main_screen_display_path": "Example value",
     *                 "side_screen_display_path": 1,
     *                 "video_display_path": 1,
     *                 "appointment_display_flag": "Example value",
     *                 "screen_display_flag": "Example value",
     *                 "testimonial_display_flag": "Example value",
     *                 "side_screen_display_flag": 1,
     *                 "media_screen_display_flag": "Example value",
     *                 "appointment_display_time_period": "Example value",
     *                 "screen_display_time_period": "Example value",
     *                 "testimonial_display_time_period": "Example value",
     *                 "side_screen_display_time_period": 1,
     *                 "no_of_screens_per_cycle": "Example value",
     *                 "no_of_testimonials_per_cycle": "Example value",
     *                 "no_of_media_per_cycle": "Example value",
     *                 "is_newsticker_display": true,
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
     * @return ClinicTVConfigurationResource
     */
    public function show(ClinicTVConfiguration $clinicTVConfiguration)
    {
        //
    }

    /**
     * @group ClinicTVConfiguration
     *
     * @method GET
     *
     * Edit clinictvconfiguration
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinictvconfiguration to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_configuration": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "location": "Example value",
     *                 "custom_text_1": "Example value",
     *                 "custom_text_2": "Example value",
     *                 "logo_path": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "main_screen_display_path": "Example value",
     *                 "side_screen_display_path": 1,
     *                 "video_display_path": 1,
     *                 "appointment_display_flag": "Example value",
     *                 "screen_display_flag": "Example value",
     *                 "testimonial_display_flag": "Example value",
     *                 "side_screen_display_flag": 1,
     *                 "media_screen_display_flag": "Example value",
     *                 "appointment_display_time_period": "Example value",
     *                 "screen_display_time_period": "Example value",
     *                 "testimonial_display_time_period": "Example value",
     *                 "side_screen_display_time_period": 1,
     *                 "no_of_screens_per_cycle": "Example value",
     *                 "no_of_testimonials_per_cycle": "Example value",
     *                 "no_of_media_per_cycle": "Example value",
     *                 "is_newsticker_display": true,
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
     * @return ClinicTVConfigurationResource
     */
    public function edit(ClinicTVConfiguration $clinicTVConfiguration)
    {
        //
    }

    /**
     * @group ClinicTVConfiguration
     *
     * @method PUT
     *
     * Update an existing clinictvconfiguration
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinictvconfiguration to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ClinicName string optional. Example: "Example ClinicName"
     * @bodyParam Location string optional. Example: "Example Location"
     * @bodyParam CustomText1 string optional. Example: "Example CustomText1"
     * @bodyParam CustomText2 string optional. Example: "Example CustomText2"
     * @bodyParam LogoPath string optional. Example: "Example LogoPath"
     * @bodyParam ClinicLogo string optional. Example: "Example ClinicLogo"
     * @bodyParam MainScreenDisplayPath string optional. Example: "Example MainScreenDisplayPath"
     * @bodyParam SideScreenDisplayPath string optional. Maximum length: 255. Example: "1"
     * @bodyParam VideoDisplayPath string optional. Maximum length: 255. Example: "1"
     * @bodyParam AppointmentDisplayFlag string optional. Example: "Example AppointmentDisplayFlag"
     * @bodyParam ScreenDisplayFlag string optional. Example: "Example ScreenDisplayFlag"
     * @bodyParam TestimonialDisplayFlag string optional. Example: "Example TestimonialDisplayFlag"
     * @bodyParam SideScreenDisplayFlag string optional. Maximum length: 255. Example: "1"
     * @bodyParam MediaScreenDisplayFlag string optional. Example: "Example MediaScreenDisplayFlag"
     * @bodyParam AppointmentDisplayTimePeriod string optional. Example: "Example AppointmentDisplayTimePeriod"
     * @bodyParam ScreenDisplayTimePeriod string optional. Example: "Example ScreenDisplayTimePeriod"
     * @bodyParam TestimonialDisplayTimePeriod string optional. Example: "Example TestimonialDisplayTimePeriod"
     * @bodyParam SideScreenDisplayTimePeriod string optional. Maximum length: 255. Example: "1"
     * @bodyParam NoOfScreensPerCycle string optional. Example: "Example NoOfScreensPerCycle"
     * @bodyParam NoOfTestimonialPerCycle string optional. Example: "Example NoOfTestimonialPerCycle"
     * @bodyParam NoOfMediaPerCycle string optional. Example: "Example NoOfMediaPerCycle"
     * @bodyParam IsNewstickerDisplay string optional. Example: "Example IsNewstickerDisplay"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_tv_configuration": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "location": "Example value",
     *                 "custom_text_1": "Example value",
     *                 "custom_text_2": "Example value",
     *                 "logo_path": "Example value",
     *                 "clinic_logo": "Example value",
     *                 "main_screen_display_path": "Example value",
     *                 "side_screen_display_path": 1,
     *                 "video_display_path": 1,
     *                 "appointment_display_flag": "Example value",
     *                 "screen_display_flag": "Example value",
     *                 "testimonial_display_flag": "Example value",
     *                 "side_screen_display_flag": 1,
     *                 "media_screen_display_flag": "Example value",
     *                 "appointment_display_time_period": "Example value",
     *                 "screen_display_time_period": "Example value",
     *                 "testimonial_display_time_period": "Example value",
     *                 "side_screen_display_time_period": 1,
     *                 "no_of_screens_per_cycle": "Example value",
     *                 "no_of_testimonials_per_cycle": "Example value",
     *                 "no_of_media_per_cycle": "Example value",
     *                 "is_newsticker_display": true,
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
     * @return ClinicTVConfigurationResource
     */
    public function update(UpdateClinicTVConfigurationRequest $request, ClinicTVConfiguration $clinicTVConfiguration)
    {
        try {
            $validatedData = $request->validated();

            $updatedConfiguration = $this->clinicTVConfigurationService->updateClinicTVConfiguration($clinicTVConfiguration, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic TV configuration updated successfully',
                'clinic_tv_configuration' => new ClinicTVConfigurationResource($updatedConfiguration)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic TV configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic TV configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicTVConfiguration
     *
     * @method DELETE
     *
     * Delete a clinictvconfiguration
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinictvconfiguration to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicTVConfiguration $clinicTVConfiguration)
    {
        //
    }
}
