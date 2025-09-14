<?php

namespace App\Services;

use App\Models\PatientConsentDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\PatientConsentDetailResource;

class PatientConsentDetailService
{
    /**
     * Create a new patient consent detail record.
     *
     * @param array $data The validated data for creating the patient consent detail
     * @return PatientConsentDetail The newly created patient consent detail model
     */
    public function createConsentDetail(array $data): PatientConsentDetail
    {
        return PatientConsentDetail::create($data);
    }

    /**
     * Update an existing patient consent detail record.
     *
     * @param PatientConsentDetail $patientConsentDetail The patient consent detail model to update
     * @param array $data The validated data for updating the patient consent detail
     * @return PatientConsentDetail The updated patient consent detail model
     */
    public function updateConsentDetail(PatientConsentDetail $patientConsentDetail, array $data): PatientConsentDetail
    {
        $patientConsentDetail->update($data);
        return $patientConsentDetail;
    }
}
