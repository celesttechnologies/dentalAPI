<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientLabWorkResource extends JsonResource
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
            'patient_lab_work_id' => $this->PatientLabWorkID,
            'patient_lab_id' => $this->PatientLabID,
            'work_pattern_dr' => $this->WorkPatternDR,
            'work_pattern_tec' => $this->WorkPatternTec,
            'work_pattern_date' => $this->WorkPatternDate,
            'work_pattern_time' => $this->WorkPatternTime,
            'metal_work_dr' => $this->MetalWorkDR,
            'metal_work_tec' => $this->MetalWorkTec,
            'metal_work_date' => $this->MetalWorkDate,
            'metal_work_time' => $this->MetalWorkTime,
            'ceramics_dr' => $this->CeramicsDR,
            'ceramics_tec' => $this->CeramicsTec,
            'ceramics_date' => $this->CeramicsDate,
            'ceramics_time' => $this->CeramicsTime,
            'denture_dr' => $this->DentureDR,
            'denture_tec' => $this->DentureTec,
            'denture_date' => $this->DentureDate,
            'denture_time' => $this->DentureTime,
        ];
    }
}