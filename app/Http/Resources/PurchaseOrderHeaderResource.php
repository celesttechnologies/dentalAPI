<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderHeaderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'purchase_order_header_id' => $this->PurchaseOrderHeaderId,
            'clinic_id' => $this->ClinicID,
            'purchase_order_no' => $this->PurchaseOrderNo,
            'purchase_order_date' => $this->PurchaseOrderDate,
            'item_supplier_id' => $this->ItemSupplierID,
            'invoice_no' => $this->InvoiceNo,
            'invoice_date' => $this->InvoiceDate,
            'narration' => $this->Naration,
            'arrival_date' => $this->ArrivalDate,
            'total' => $this->Total,
            'tax' => $this->Tax,
            'other_expenses' => $this->OtherExp,
            'discount' => $this->Discount,
            'grand_total' => $this->GrandTotal,
            'paid_amount' => $this->PaidAmt,
            'balance_amount' => $this->BalanceAmt,
            'is_deleted' => $this->IsDeleted,
            'created_by' => $this->CreateBy,
            'created_on' => $this->CreateOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'less_amount' => $this->LessAmt,
            'row_guid' => $this->rowguid,
        ];
    }
}