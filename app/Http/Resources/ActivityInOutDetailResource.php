<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityInOutDetailResource extends JsonResource
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
            'activity_in_out_header_id' => $this->ActivityHeaderId,
            'item_id' => $this->ItemId,
            'quantity' => $this->Quantity,
            'remarks' => $this->Price,
        ];
    }
}
