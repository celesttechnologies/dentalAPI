<?php


namespace App\Services\Reports;

use Illuminate\Support\Facades\DB;

class DailyNewPatientListService
{
    /**
     * Get daily new patient list report data based on filters.
     *
     * @param array $filters
     * @return array
     */
    public function getDailyNewPatientList(array $filters): array
    {
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;

        if (!$startDate || !$endDate) {
            return [];
        }

        // Join PatientReceipt and sum TreatmentPayment
        $patients = \App\Models\Patient::query()
            ->whereBetween(DB::raw('DATE(Patient.RegistrationDate)'), [$startDate, $endDate])
            ->leftJoin('PatientReceipts', 'PatientReceipts.PatientID', '=', 'Patient.PatientID')
            ->select([
                DB::raw('DATE(Patient.RegistrationDate) as RegistrationDate'),
                'Patient.CaseID',
                DB::raw("CONCAT(Patient.Title, ' ', Patient.FirstName, ' ', Patient.LastName) as FullName"),
                'Patient.Gender',
                'Patient.Age',
                DB::raw("CONCAT(Patient.AddressLine1, ' ', Patient.AddressLine2) as Address"),
                'Patient.PhoneNumber',
                'Patient.MobileNumber',
                DB::raw('SUM(PatientReceipts.TreatmentPayment) as AmountPaid'),
            ])
            ->groupBy([
                'Patient.PatientID',
                'Patient.RegistrationDate',
                'Patient.CaseID',
                'Patient.Title',
                'Patient.FirstName',
                'Patient.LastName',
                'Patient.Gender',
                'Patient.Age',
                'Patient.AddressLine1',
                'Patient.AddressLine2',
                'Patient.PhoneNumber',
                'Patient.MobileNumber',
            ])
            ->get()
            ->toArray();

        return $patients;
    }
}
