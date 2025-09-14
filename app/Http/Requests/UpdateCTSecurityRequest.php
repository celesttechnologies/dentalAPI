<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCTSecurityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ObjectType' => 'sometimes|string',
			'ObjectID' => 'sometimes|string|max:255',
			'ObjectDetails' => 'sometimes|string',
			'UserObjectID' => 'sometimes|string|max:255',
			'UserObjectType' => 'sometimes|string',
			'FullControl' => 'sometimes|string',
			'Write' => 'sometimes|string',
			'Modify' => 'sometimes|string',
			'ReadExecute' => 'sometimes|string',
			'ListContent' => 'sometimes|string',
			'ReadOnly' => 'sometimes|string',
			'SpecialPermissions' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}