<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientLabWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientLabID' => 'sometimes|string|max:255',
			'WorkPatternDR' => 'sometimes|string',
			'WorkPatternTec' => 'sometimes|string',
			'WorkPatternDate' => 'sometimes|date',
			'WorkPatternTime' => 'sometimes|string',
			'MetalWorkDR' => 'sometimes|string',
			'MetalWorkTec' => 'sometimes|string',
			'MetalWorkDate' => 'sometimes|date',
			'MetalWorkTime' => 'sometimes|string',
			'CeramicsDR' => 'sometimes|string',
			'CeramicsTec' => 'sometimes|string',
			'CeramicsDate' => 'sometimes|date',
			'CeramicsTime' => 'sometimes|string',
			'DentureDR' => 'sometimes|string',
			'DentureTec' => 'sometimes|string',
			'DentureDate' => 'sometimes|date',
			'DentureTime' => 'sometimes|string',
        ];
    }
}