<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClinicID'           => 'required|string|max:255',
            'Name'               => 'required|string|max:255',
            'Address1'           => 'nullable|string|max:255',
            'Address2'           => 'required|string|max:255',
            'City'               => 'nullable|string|max:255',
            'State'              => 'nullable|string|max:255',
            'CountryID'          => 'required|integer',
            'Phone'              => 'nullable|string|max:15',
            'Fax'                => 'nullable|string|max:15',
            'Email'              => 'nullable|email',
            'Description'        => 'nullable|string',
            'AuthenticationKey'  => 'nullable|string|max:255',
            'LastUpdatedOn'      => 'nullable|date',
            'LastUpdatedBy'      => 'nullable|string|max:255',
            'FTPBackupServer'    => 'nullable|string|max:255',
            'FTPPassword'        => 'nullable|string|max:255',
            'FTPUserID'          => 'nullable|string|max:255',
            'EmailHost'          => 'nullable|string|max:255',
            'EmailPassword'      => 'nullable|string|max:255',
            'EmailPort'          => 'nullable|string|max:50',
            'EmailUserid'        => 'nullable|string|max:255',
            'CreatedOn'          => 'nullable|date',
            'CreatedBy'          => 'nullable|string|max:255',
            'AuthenticationKeyGuid' => 'nullable|string|max:255',
            'LicenseTypeID'      => 'required|integer',
            'LicenseValidTill'   => 'nullable|date',
            'ClinicCode'         => 'nullable|string|max:100',
            'ClinicLetterHeadHeader' => 'nullable|string',
            'ClinicLogo'         => 'nullable|string',
            'rowguid'            => 'nullable|string|max:255',
            'PatientKioskTabAccess' => 'nullable|string|max:100',
        ];
    }
}