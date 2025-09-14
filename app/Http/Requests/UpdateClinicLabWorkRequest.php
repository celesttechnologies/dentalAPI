<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicLabWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'OrderNo' => 'sometimes|string',
			'OrderNumber' => 'sometimes|string',
			'ProviderID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'LabWorkDate' => 'sometimes|date',
			'LabSupplierID' => 'sometimes|string|max:255',
			'DeliveryDate' => 'sometimes|date',
			'OrderType' => 'sometimes|string',
			'ParentLabWorkID' => 'sometimes|string|max:255',
			'StageID' => 'sometimes|string|max:255',
			'SentRecievedIDCSV' => 'sometimes|string|max:255',
			'Shade' => 'sometimes|string',
			'SelectedTeeth' => 'sometimes|string',
			'PonticDesignsIDCSV' => 'sometimes|string|max:255',
			'CollarMetalDesignsIDCSV' => 'sometimes|string|max:255',
			'TotalCost' => 'sometimes|numeric',
			'Instructions' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'lastUpdatedBy' => 'sometimes|date',
			'LabStatus' => 'sometimes|string',
			'WarrantyDetails' => 'sometimes|string',
			'LabInvoiceDate' => 'sometimes|date',
			'LabInvoiceNumber' => 'sometimes|string',
        ];
    }
}