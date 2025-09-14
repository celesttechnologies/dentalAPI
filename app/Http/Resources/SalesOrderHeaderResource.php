<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesOrderHeaderResource extends JsonResource
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
            'sales_order_header_id' => $this->SalesOrderHeaderId,
            'clinic_id' => $this->ClinicID,
            'sales_order_no' => $this->SalesOrderNo,
            'sales_order_date' => $this->SalesOrderDate,
            'item_customer_id' => $this->ItemCustomerID,
            'invoice_no' => $this->InvoiceNo,
            'invoice_date' => $this->InvoiceDate,
            'narration' => $this->Naration,
            'despatch_date' => $this->DespatchDate,
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