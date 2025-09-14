<?php

namespace App\Services\Reports;

use App\Models\PatientReceipt;
use Illuminate\Support\Facades\DB;

class DailyCollectionService
{
    /**
     * Get daily collection report data based on filters.
     *
     * @param array $filters
     * @return array
     */
    public function getDailyCollection(array $filters): array
    {
        $query = DB::table('PatientReceiptsDetails')
            ->select([
                DB::raw('DATE(PatientReceipts.ReceiptDate) as date'),
                'PatientTreatmentsDone.ProviderID as doctor_id',
                'PatientReceipts.PatientID',
                'PatientReceiptsDetails.PatientTreatmentDoneID',
                'PatientReceipts.ModeOfPayment as ModeofPayment',
                'PatientInvoices.TreatmentTotalPayment as amount',
                'PatientInvoices.InvoiceNumber as receipt_number',
                'PatientInvoices.TreatmentTotalCost as grand_total',
                'Provider.ProviderName as doctor_name',
                DB::raw('CONCAT(Patient.Title, " ", Patient.FirstName, " ", Patient.LastName) as patient_name'),
                'Patient.PatientCode as patient_code',
            ])
            ->leftJoin('PatientReceipts', 'PatientReceiptsDetails.ReceiptID', '=', 'PatientReceipts.ReceiptID')
            ->leftJoin('PatientInvoices', 'PatientReceiptsDetails.InvoiceID', '=', 'PatientInvoices.InvoiceID')
            ->leftJoin('PatientTreatmentsDone', 'PatientReceiptsDetails.PatientTreatmentDoneID', '=', 'PatientTreatmentsDone.PatientTreatmentDoneID')
            ->leftJoin('Patient', 'PatientReceipts.PatientID', '=', 'Patient.PatientID')
            ->leftJoin('Provider', 'PatientTreatmentsDone.ProviderID', '=', 'Provider.ProviderID');

        if (!empty($filters['start_date'])) {
            $query->whereDate('PatientReceipts.ReceiptDate', '>=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $query->whereDate('PatientReceipts.ReceiptDate', '<=', $filters['end_date']);
        }
        if (!empty($filters['doctor_id']) && $filters['doctor_id'] !== 'all') {
            $query->where('PatientTreatmentsDone.ProviderID', $filters['doctor_id']);
        }
        if (!empty($filters['mode_of_payment']) && $filters['mode_of_payment'] !== 'all') {
            $query->where('PatientReceipts.ModeOfPayment', $filters['mode_of_payment']);
        }
        if (!empty($filters['time_shift']) && $filters['time_shift'] !== 'all') {
            $query->whereRaw(
                $filters['time_shift'] === 'before_2pm' ?
                'TIME(PatientReceipts.ReceiptDate) < "14:00:00"' :
                'TIME(PatientReceipts.ReceiptDate) >= "14:00:00"'
            );
        }

        $results = $query->orderBy('date')->get()->groupBy('date');

        $data = [];
        foreach ($results as $date => $items) {
            $doctorGroups = $items->groupBy('doctor_name');
            $doctorArray = [];
            foreach ($doctorGroups as $doctor_name => $doctorItems) {
                $doctorData = [];
                foreach ($doctorItems as $item) {
                    $doctorData[] = [
                        'doctor_name' => $doctor_name,
                        'doctor_id' => $item->doctor_id,
                        'patient_name' => $item->patient_name,
                        'patient_code' => $item->patient_code,
                        'payable_mode' => $item->ModeofPayment,
                        'amount' => $item->amount,
                        'grand_total' => $item->grand_total,
                        'receipt_number' => $item->receipt_number,
                    ];
                }
                $doctorArray[$doctor_name] = $doctorData;
            }
            $data[$date] = $doctorArray;
        }
        return $data;
    }
}
