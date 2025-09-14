<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DrugResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->DrugId,
            'clinic_id' => $this->ClinicID,
            'generic_name' => $this->GenericName,
            'contraindications' => $this->Contraindications,
            'interactions' => $this->Interactions,
            'adverse_effects' => $this->AdverseEffects,
            'overdoze_management' => $this->OverdozeManagement,
            'precautions' => $this->Precautions,
            'patient_alerts' => $this->PatientAlerts,
            'other_info' => $this->OtherInfo,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}
