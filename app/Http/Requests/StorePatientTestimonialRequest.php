<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientTestimonialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'PatientName' => 'required|string',
			'Title' => 'required|string',
			'Description' => 'required|string',
			'DateOfTestimonial' => 'required|date',
			'DocumentID' => 'required|string|max:255',
			'PublishedFrom' => 'required|string',
			'PublishedTill' => 'required|string',
			'ShowOnTV' => 'required|string',
			'IsDelted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}