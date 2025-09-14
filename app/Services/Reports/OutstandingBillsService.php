<?php

namespace App\Services\Reports;

use App\Models\PatientInvoice;
use Illuminate\Support\Facades\DB;

class OutstandingBillsService
{
    public function getOutstandingBills(array $filters)
    {
        $query = PatientInvoice::query()
            ->leftJoin('PatientReceipts as pr', 'PatientInvoice.InvoiceID', '=', 'pr.InvoiceID')
            ->leftJoin('Patient as p', 'PatientInvoice.PatientID', '=', 'p.PatientID')
            ->select([
                'PatientInvoices.InvoiceID',
                'PatientInvoices.ProviderID',
                'p.Title',
                'p.FirstName',
                'p.LastName',
                'PatientInvoices.InvoiceCodePrefix',
                'PatientInvoices.InvoiceDate',
                'PatientInvoices.TreatmentTotalCost',
                DB::raw('COALESCE(SUM(pr.TreatmentPayment), 0) as total_paid'),
                DB::raw('PatientInvoices.TreatmentTotalCost - COALESCE(SUM(pr.TreatmentPayment), 0) as balance'),
            ]);

            if (!empty($filters['start_date'])) {
                $query->whereDate('PatientInvoices.InvoiceDate', '>=', $filters['start_date']);
            }
            if (!empty($filters['end_date'])) {
                $query->whereDate('PatientInvoices.InvoiceDate', '<=', $filters['end_date']);
            }

            $query->groupBy('PatientInvoices.InvoiceID', 'PatientInvoices.ProviderID', 'p.FirstName', 'p.LastName', 'PatientInvoices.InvoiceDate', 'PatientInvoices.TreatmentTotalCost');

        return $query->get();
    }
}
