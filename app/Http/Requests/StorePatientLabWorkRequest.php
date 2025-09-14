<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientLabWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientLabID' => 'required|string|max:255',
			'WorkPatternDR' => 'required|string',
			'WorkPatternTec' => 'required|string',
			'WorkPatternDate' => 'required|date',
			'WorkPatternTime' => 'required|string',
			'MetalWorkDR' => 'required|string',
			'MetalWorkTec' => 'required|string',
			'MetalWorkDate' => 'required|date',
			'MetalWorkTime' => 'required|string',
			'CeramicsDR' => 'required|string',
			'CeramicsTec' => 'required|string',
			'CeramicsDate' => 'required|date',
			'CeramicsTime' => 'required|string',
			'DentureDR' => 'required|string',
			'DentureTec' => 'required|string',
			'DentureDate' => 'required|date',
			'DentureTime' => 'required|string',
        ];
    }
}