<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicSearchAgentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'AgentName' => 'sometimes|string',
			'AgentPurposeID' => 'sometimes|string|max:255',
			'AgentDetails' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
        ];
    }
}