<?php

namespace App\Services\Reports;

class PatientsReportService
{
    public function getPatientsReport(array $filters): array
    {
        // Fetch patients in registration date range
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;
        $patientsQuery = \App\Models\Patient::query()
            ->select([
                'PatientID',
                'RegistrationDate',
                'CaseID',
                'Title',
                'FirstName',
                'LastName',
                'Gender',
                'PhoneNumber',
                'MobileNumber',
                'EmailAddress1',
            ]);
        if ($startDate) {
            $patientsQuery->whereDate('RegistrationDate', '>=', $startDate);
        }
        if ($endDate) {
            $patientsQuery->whereDate('RegistrationDate', '<=', $endDate);
        }
        $patients = $patientsQuery->get();

        $report = [];
        foreach ($patients as $patient) {
            $treatments = \App\Models\PatientTreatmentsDone::query()
                ->where('PatientID', $patient->PatientID)
                ->get();

            $lastTreatment = $treatments->sortByDesc('TreatmentDate')->first();

            $totalCost = $treatments->sum('TreatmentCost');
            $totalPayment = $treatments->sum('TreatmentPayment');
            $totalBalance = $treatments->sum('TreatmentBalance');

            $rangeTreatments = $treatments;
            if ($startDate) {
                $rangeTreatments = $rangeTreatments->where('TreatmentDate', '>=', $startDate);
            }
            if ($endDate) {
                $rangeTreatments = $rangeTreatments->where('TreatmentDate', '<=', $endDate);
            }

            $rangeCost = $rangeTreatments->sum('TreatmentCost');
            $rangePayment = $rangeTreatments->sum('TreatmentPayment');
            $rangeBalance = $rangeTreatments->sum('TreatmentBalance');

            $report[] = [
                'RegistrationDate' => $patient->RegistrationDate,
                'CaseID' => $patient->CaseID,
                'PatientFullName' => trim($patient->Title . ' ' . trim($patient->FirstName) . ' ' . $patient->LastName),
                'Gender' => $patient->Gender,
                'PhoneNumber' => $patient->PhoneNumber,
                'MobileNumber' => $patient->MobileNumber,
                'EmailAddress' => $patient->EmailAddress1,
                'LastTreatmentDate' => $lastTreatment ? $lastTreatment->TreatmentDate : null,
                'TotalTreatmentCost' => $totalCost,
                'TotalTreatmentPayment' => $totalPayment,
                'TotalTreatmentBalance' => $totalBalance,
                'RangeTreatmentCost' => $rangeCost,
                'RangeTreatmentPayment' => $rangePayment,
                'RangeTreatmentBalance' => $rangeBalance,
            ];
        }
        return $report;
    }
}
