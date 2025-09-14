<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCTSecurityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ObjectType' => 'required|string',
			'ObjectID' => 'required|string|max:255',
			'ObjectDetails' => 'required|string',
			'UserObjectID' => 'required|string|max:255',
			'UserObjectType' => 'required|string',
			'FullControl' => 'required|string',
			'Write' => 'required|string',
			'Modify' => 'required|string',
			'ReadExecute' => 'required|string',
			'ListContent' => 'required|string',
			'ReadOnly' => 'required|string',
			'SpecialPermissions' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
        ];
    }
}