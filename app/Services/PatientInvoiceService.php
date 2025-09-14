<?php

namespace App\Services;

use App\Models\PatientInvoice; // Assuming you have a PatientInvoice model
use App\Http\Resources\PatientInvoiceResource; // Assuming you have a resource for Patient Invoice
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientInvoiceService
{
    /**
     * Get a paginated list of Patient Invoices.
     *
     * @param int $perPage
     * @return array
     */
    public function getInvoices($patient = null, int $perPage, array $filters = []): array
    {
        $query = PatientInvoice::query();

        if ($patient) {
            $query->where('PatientID', $patient);
        }

        if (!empty($filters['start_date'])) {
            $query->whereDate('InvoiceDate', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('InvoiceDate', '<=', $filters['end_date']);
        }

        $data = $query->paginate($perPage); 

        return [
            'invoices' => $data, 
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
    public function createInvoice(array $data): PatientInvoice
    {
        // Create and return a new PatientInvoice
        return PatientInvoice::create($data);
    }
    public function updateInvoice(PatientInvoice $pi, array $data): PatientInvoice
    {
        $pi->update($data); // Update the invoice with the provided data
        $pi->fresh();
        return $pi;
    }
}