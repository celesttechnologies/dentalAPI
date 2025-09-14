<?php

namespace App\Services;

use App\Models\PatientInvoicesRB; // Assuming you have a PatientInvoicesRB model
use App\Http\Resources\PatientInvoicesRBResource; // Assuming you have a resource for Patient Invoices RB
use App\Models\Patient;

class PatientInvoicesRBService
{
    /**
     * Get a paginated list of Patient Invoices RB.
     *
     * @param int $perPage
     * @return array
     */
    public function getInvoices(Patient $patient, int $perPage): array
    {
        $data = PatientInvoicesRB::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated invoices

        return [
            'invoices' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createInvoice(array $data): PatientInvoicesRB
    {
        return PatientInvoicesRB::create($data);
    }

    public function updateInvoice(PatientInvoicesRB $pirb, array $data): PatientInvoicesRB
    {
        $pirb->update($data);
        $pirb->fresh();

        return $pirb;
    }
}
