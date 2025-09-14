<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicLabWorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'patient' => $this->patient ? $this->patient->full_name : null,
            'provider' => $this->provider ? $this->provider->ProviderName : null,
            'lab_work_type' => $this->LabWorkType,
            'lab_work_date' => $this->LabWorkDate,
            'order_type' => $this->OrderType,
            'stage' => $this->stage ? $this->stage->ItemTitle : null,
            'selected_teeth' => $this->SelectedTeeth,
            'total_cost' => $this->TotalCost,
            'instructions' => $this->Instructions,
            'status' => $this->LabStatus,
            'invoice_date' => $this->LabInvoiceDate,
            'invoice_number' => $this->LabInvoiceNumber,
            'sent_date' => $this->SentDate,
            'delivery_date' => $this->DeliveryDate,
            'order_number' => $this->OrderNumber,
            'collar_metal_designs' => $this->CollarMetalDesignsIDCSV,
            'pontic_designs' => $this->PonticDesignsIDCSV,
            // Check if clinic_lab_work_details is an Eloquent relationship (Collection) or a joined result (array)
            'lab_components' => $this->clinic_lab_work_details instanceof \Illuminate\Support\Collection
                ? $this->clinic_lab_work_details->map(function ($detail) {
                    return [
                        'component_name' => $detail->component ? $detail->component->ItemTitle : null,
                        'component_description' => $detail->SelectedTeeth,
                        'cost' => $detail->LabWorkComponentCost,
                        'selected' => $detail->Selected,
                    ];
                })->values()
                : (is_array($this->clinic_lab_work_details)
                    ? array_map(function ($detail) {
                        return [
                            'component_name' => isset($detail['component']) && isset($detail['component']['ItemTitle']) ? $detail['component']['ItemTitle'] : null,
                            'component_description' => $detail['SelectedTeeth'] ?? null,
                            'cost' => $detail['LabWorkComponentCost'] ?? null,
                            'selected' => $detail['Selected'] ?? null,
                        ];
                    }, $this->clinic_lab_work_details)
                    : []
                ),
            'lab_supplier' => $this->lab ? $this->lab->SupplierName : null,
        ];
    }
}
