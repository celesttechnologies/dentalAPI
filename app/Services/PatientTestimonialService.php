<?php

namespace App\Services;

use App\Models\PatientTestimonial; // Assuming you have a PatientTestimonial model
use App\Http\Resources\PatientTestimonialResource; // Assuming you have a resource for Patient Testimonial
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientTestimonialService
{
    /**
     * Get a paginated list of Patient Testimonials.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientTestimonials(Patient $patient, int $perPage): array
    {
        $data = PatientTestimonial::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient testimonials

        return [
            'patient_testimonials' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

    /**
     * Create a new patient treatments done record.
     *
     * @param array $data The validated data for creating the patient treatments done
     * @return PatientTestimonial The newly created patient treatments done model
     */
    public function createTestimonial(array $data): PatientTestimonial
    {
        return PatientTestimonial::create($data);
    }

    /**
     * Update an existing patient treatments done record.
     *
     * @param PatientTreatmentsDone $patientTreatmentsDone The patient treatments done model to update
     * @param array $data The validated data for updating the patient treatments done
     * @return PatientTreatmentsDone The updated patient treatments done model
     */
    public function updateTestimonial(PatientTestimonial $patientTestimonial, array $data): PatientTestimonial
    {
        $patientTestimonial->update($data);
        $patientTestimonial->fresh();

        return $patientTestimonial;
    }
}