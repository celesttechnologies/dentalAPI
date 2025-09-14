<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicLabWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patientName' => 'nullable|string',
            'selectedpatient' => 'nullable|string',
            'inChargeLT' => 'required|string',
            'chair' => 'nullable|string',
            'caseType' => 'required|string',
            'Shade' => 'required',
            'supplier' => 'required|string',
            'deliveryDate' => 'required|date',
            'date' => 'required|date',
            'orderNo' => 'nullable|string',
            'showTooth' => 'nullable|boolean',
            'selected_teeth' => 'nullable|string',
            'sent' => 'nullable|array',
            'sent.*' => 'string',
            'Stage' => 'required|string',
            'labinvoiceno' => 'nullable|string',
            'invoiceDate' => 'nullable|date',
            'totalCost' => 'required|numeric',
            'status' => 'nullable|string',
            'details' => 'nullable|string',
            'instruction' => 'nullable|string',
            'collar' => 'nullable|array',
            'collar.*' => 'string',
            'labComponents' => 'required|array',
            'labComponents.*.id' => 'required|string',
            'labComponents.*.item_title' => 'required|string',
            'labComponents.*.children' => 'required|array',
            'labComponents.*.children.*.component_name' => 'required|string',
            'labComponents.*.children.*.component_description' => 'required|string',
            'labComponents.*.children.*.selected' => 'required|boolean',
            'labComponents.*.children.*.id' => 'required|string',
            'labComponents.*.children.*.teeth' => 'nullable|string',
            'labComponents.*.children.*.cost' => 'required|numeric',
        ];
    }
}