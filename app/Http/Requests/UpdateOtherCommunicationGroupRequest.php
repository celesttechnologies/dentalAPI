<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOtherCommunicationGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CommunicationGroupMasterID' => 'sometimes|string|max:255',
			'FirstName' => 'sometimes|string',
			'LastName' => 'sometimes|string',
			'MobileNumber' => 'sometimes|string',
			'EmailID' => 'sometimes|email|max:255',
			'GroupType' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'GroupSource' => 'sometimes|string',
			'GroupSourceDesc' => 'sometimes|string',
			'CountryDialCode' => 'sometimes|string',
        ];
    }
}