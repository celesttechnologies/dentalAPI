<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientConsentDetailResource extends JsonResource
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
            'ID' => $this->id,
            'TypeID' => $this->ConsentTypeId,
            'Date' => $this->ConsentDate,
            'CPName' => $this->CPName,
            'CPRelation' => $this->CPRelation,
            'CPContact' => $this->CPContact,
            'IsDeleted' => $this->IsDeleted,
            'ProcedureTypeID' => $this->ProcedureTypeID,
            'ProcedureName' => $this->ProcedureName,
            'CreatedOn' => $this->CreatedOn,
            'CreatedBy' => $this->CreatedBy,
            'LastUpdatedOn' => $this->LastUpdatedOn,
            'LastUpdatedBy' => $this->LastUpdatedBy,
        ];
    }
}
