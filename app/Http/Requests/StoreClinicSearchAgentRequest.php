<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicSearchAgentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'AgentName' => 'required|string',
			'AgentPurposeID' => 'required|string|max:255',
			'AgentDetails' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
        ];
    }
}