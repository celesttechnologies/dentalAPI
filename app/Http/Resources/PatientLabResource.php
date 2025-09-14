<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientLabResource extends JsonResource
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
            'patient_lab_id' => $this->PatientLabID,
            'patient_id' => $this->PatientID,
            'provider_id' => $this->ProviderID,
            'date_of_lab_work' => $this->DateOfLabWork,
            'time_of_lab_work' => $this->TimeOfLabWork,
            'work' => $this->Work,
            'shade' => $this->Shade,
            'mt' => $this->MT,
            'bisque' => $this->Bisque,
            'finish' => $this->Finish,
            'denture' => $this->Denture,
            'del_date' => $this->DelDate,
            'del_time' => $this->DelTime,
            'rec_date' => $this->RecDate,
            'remark' => $this->Remark,
            'rec_time' => $this->RecTime,
            'lab_id' => $this->LabID,
            'is_deleted' => $this->IsDeleted,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'reference_no' => $this->ReferenceNo,
            'row_guid' => $this->rowguid,
        ];
    }
}