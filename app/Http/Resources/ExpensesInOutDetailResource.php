<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpensesInOutDetailResource extends JsonResource
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
            'id' => $this->ExpensesDetailID,
            'expenses_header_id' => $this->ExpensesHeaderID,
            'expenses_type_id' => $this->ExpensesTypeID,
            'other_expenses' => $this->OtherExpenses,
            'amount' => $this->Amount,
            'paid_by' => $this->PaidBy,
        ];
    }
}