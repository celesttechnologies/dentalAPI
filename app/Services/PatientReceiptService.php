<?php

namespace App\Services;

use App\Models\PatientReceipt; // Assuming you have a PatientReceipt model
use App\Http\Resources\PatientReceiptResource; // Assuming you have a resource for Patient Receipt
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientReceiptService
{
    /**
     * Get a paginated list of Patient Receipts.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientReceipts($patient = null, int $perPage, array $filters = []): array
    {
        $query = PatientReceipt::query();

        if ($patient) {
            $query->where('PatientID', $patient);
        }

        if (!empty($filters['start_date'])) {
            $query->whereDate('ReceiptDate', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('ReceiptDate', '<=', $filters['end_date']);
        }

        $data = $query->paginate($perPage);

        return [
            'patient_receipts' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'last_page' => $data->lastPage(),
            ]
        ];
    }

   
    public function createPatientReceipt(array $data): PatientReceipt
    {
        // Fetch the invoice
        $invoice = \App\Models\PatientInvoice::with(['invoiceDetails'])->findOrFail($data['InvoiceID']);

        // Fetch treatment info
        $treatment = null;
        if ($invoice->PatientTreatmentDoneID) {
            $treatment = \App\Models\PatientTreatmentsDone::find($invoice->PatientTreatmentDoneID);
        }

        // Calculate amounts from invoice details
        $invoicedAmount = $invoice->invoiceDetails->sum('TreatmentTotalCost');
        $treatmentPayment = $treatment ? $treatment->TreatmentPayment : null;
        $balanceAmount = $invoicedAmount - ($treatmentPayment ?? 0);

        // Merge calculated fields into data
        $data['InvoicedAmount'] = $invoicedAmount;
        $data['TreatmentPayment'] = $treatmentPayment;
        $data['BalanceAmount'] = $balanceAmount;
        $data['PatientTreatmentDoneId'] = $invoice->PatientTreatmentDoneID;
        $data['WaitingAreaID'] = $treatment ? $treatment->WaitingAreaID : null;

        // Create the receipt
        $receipt = PatientReceipt::create($data);

        // Insert PatientReceiptsDetail for each invoice detail
        foreach ($invoice->invoiceDetails as $invoiceDetail) {
            \App\Models\PatientReceiptsDetail::create([
                'ReceiptID' => $receipt->ReceiptID,
                'InvoiceID' => $invoice->InvoiceID,
                'PatientTreatmentDoneID' => $invoiceDetail->PatientTreatmentDoneID,
                'AmountPaid' => $invoiceDetail->TreatmentTotalCost,
                'IsDeleted' => false,
                'CreatedOn' => now(),
                'CreatedBy' => $data['CreatedBy'] ?? null,
                'LastUpdatedOn' => now(),
                'LastUpdatedBy' => $data['LastUpdatedBy'] ?? null,
            ]);
        }

        return $receipt;
    }

    public function updatePatientReceipt(PatientReceipt $patientReceipt, array $data): PatientReceipt
    {
        $patientReceipt->update($data);
        $patientReceipt->fresh();
        return $patientReceipt;
    }

   
}
