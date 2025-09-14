<?php

namespace App\Services;

use App\Models\PatientInsuranceDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\PatientInsuranceDetailResource;
use App\Models\Patient;

class PatientInsuranceDetailService
{
    /**
     * Get a paginated list of Patient Insurance Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getInsuranceDetails(Patient $patient, int $perPage): array
    {
        $data = PatientInsuranceDetail::where('PatientID', $patient->id)->paginate($perPage); // Filter out deleted records

        return [
            'insurance_details' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new insurance detail record.
     *
     * @param array $data The validated data for creating the insurance detail
     * @return PatientInsuranceDetail The newly created insurance detail model
     */
    public function createInsuranceDetail(array $data): PatientInsuranceDetail
    {
        return PatientInsuranceDetail::create($data);
    }

    /**
     * Update an existing insurance detail record.
     *
     * @param PatientInsuranceDetail $patientInsuranceDetail The insurance detail model to update
     * @param array $data The validated data for updating the insurance detail
     * @return PatientInsuranceDetail The updated insurance detail model
     */
    public function updateInsuranceDetail(PatientInsuranceDetail $patientInsuranceDetail, array $data): PatientInsuranceDetail
    {
        $patientInsuranceDetail->update($data);
        return $patientInsuranceDetail;
    }
}