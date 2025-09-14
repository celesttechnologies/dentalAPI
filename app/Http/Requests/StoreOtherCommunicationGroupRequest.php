<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOtherCommunicationGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CommunicationGroupMasterID' => 'required|string|max:255',
			'FirstName' => 'required|string',
			'LastName' => 'required|string',
			'MobileNumber' => 'required|string',
			'EmailID' => 'required|email|max:255',
			'GroupType' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'GroupSource' => 'required|string',
			'GroupSourceDesc' => 'required|string',
			'CountryDialCode' => 'required|string',
        ];
    }
}