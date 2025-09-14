<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpensesInOutHeaderResource extends JsonResource
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
            'id' => $this->ExpensesHeaderID,
            'clinic_id' => $this->ClinicID,
            'expense_category' => $this->ExpenseCategory,
            'number_of_expense_items' => $this->NoOfExpenseItems,
            'total_amount' => $this->TotalAmount,
            'expense_date' => $this->ExpenseDate,
            'created_by' => $this->CreatedBy,
            'created_on' => $this->CreatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'comments' => $this->Comments,
            'is_deleted' => $this->IsDeleted,
            'row_guid' => $this->rowguid,
        ];
    }
}