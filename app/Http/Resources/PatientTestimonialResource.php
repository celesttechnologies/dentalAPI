<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientTestimonialResource extends JsonResource
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
            'testimonial_id' => $this->TestimonialID,
            'clinic_id' => $this->ClinicID,
            'patient_id' => $this->PatientID,
            'patient_name' => $this->PatientName,
            'title' => $this->Title,
            'description' => $this->Description,
            'date_of_testimonial' => $this->DateOfTestimonial,
            'document_id' => $this->DocumentID,
            'published_from' => $this->PublishedFrom,
            'published_till' => $this->PublishedTill,
            'show_on_tv' => $this->ShowOnTV,
            'is_deleted' => $this->IsDelted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
        ];
    }
}