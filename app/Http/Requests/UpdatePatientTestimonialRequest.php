<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientTestimonialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'PatientName' => 'sometimes|string',
			'Title' => 'sometimes|string',
			'Description' => 'sometimes|string',
			'DateOfTestimonial' => 'sometimes|date',
			'DocumentID' => 'sometimes|string|max:255',
			'PublishedFrom' => 'sometimes|string',
			'PublishedTill' => 'sometimes|string',
			'ShowOnTV' => 'sometimes|string',
			'IsDelted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}