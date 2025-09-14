<?php

namespace App\Services;

use App\Models\PatientReceiptsDetail; // Assuming you have a PatientReceiptsDetail model
use App\Http\Resources\PatientReceiptsDetailResource; // Assuming you have a resource for Patient Receipts Detail
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientReceiptsDetailService
{
    /**
     * Get a paginated list of Patient Receipts Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientReceiptsDetails(Patient $patient, int $perPage): array
    {
        $data = PatientReceiptsDetail::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient receipts details

        return [
            'patient_receipts_details' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

    /**
     * Get a single Patient Receipt Detail by ID.
     *
     * @param string $id
     * @return PatientReceiptsDetail
     * @throws ModelNotFoundException
     */

    /**
     * Create a new receipt detail record.
     *
     * @param array $data The validated data for creating the receipt detail
     * @return PatientReceiptsDetail The newly created receipt detail model
     */
    public function createReceiptDetail(array $data): PatientReceiptsDetail
    {
        return PatientReceiptsDetail::create($data);
    }

    /**
     * Update an existing receipt detail record.
     *
     * @param PatientReceiptsDetail $patientReceiptsDetail The receipt detail model to update
     * @param array $data The validated data for updating the receipt detail
     * @return PatientReceiptsDetail The updated receipt detail model
     */
    public function updateReceiptDetail(PatientReceiptsDetail $patientReceiptsDetail, array $data): PatientReceiptsDetail
    {
        $patientReceiptsDetail->update($data);
        return $patientReceiptsDetail;
    }
}