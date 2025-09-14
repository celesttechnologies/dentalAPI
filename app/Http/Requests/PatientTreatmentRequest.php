<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientTreatmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, |array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'PatientID' => 'required|uuid',
            'ProviderID' => 'required|uuid',
            'TreatmentTypeID' => 'required|integer',
            'TeethTreatment' => 'nullable|string',
            'TreatmentDetails' => 'required|string',
            'TreamentCost' => 'nullable|numeric',
            'TreatmentPayment' => 'nullable|numeric',
            'TreatmentBalance' => 'nullable|numeric',
            'TreatmentDate' => 'nullable|date',
            'ProviderInchargeID' => 'nullable|uuid',
            'AddedBy' => 'required|string',
            'AddedOn' => 'required|date',
            'LastUpdatedBy' => 'required|string',
            'LastUpdatedOn' => 'required|date',
        ];
        
    }    
}
