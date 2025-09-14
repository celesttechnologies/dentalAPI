<?php

namespace App\Services;

use App\Models\PatientInvoicesDetail; // Assuming you have a PatientInvoicesDetail model
use App\Http\Resources\PatientInvoicesDetailResource; // Assuming you have a resource for Patient Invoice Details
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientInvoicesDetailService
{
    /**
     * Get a paginated list of Patient Invoice Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getInvoiceDetails(Patient $patient, int $perPage): array
    {
        $data = PatientInvoicesDetail::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated invoice details

        return [
            'invoice_details' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new invoice detail record.
     *
     * @param array $data The validated data for creating the invoice detail
     * @return PatientInvoicesDetail The newly created invoice detail model
     */
    public function createInvoiceDetail(array $data): PatientInvoicesDetail
    {
        return PatientInvoicesDetail::create($data);
    }

    /**
     * Update an existing invoice detail record.
     *
     * @param PatientInvoicesDetail $patientInvoicesDetail The invoice detail model to update
     * @param array $data The validated data for updating the invoice detail
     * @return PatientInvoicesDetail The updated invoice detail model
     */
    public function updateInvoiceDetail(PatientInvoicesDetail $patientInvoicesDetail, array $data): PatientInvoicesDetail
    {
        $patientInvoicesDetail->update($data);
        return $patientInvoicesDetail;
    }
}