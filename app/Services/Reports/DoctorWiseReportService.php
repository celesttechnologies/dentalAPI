<?php

namespace App\Services\Reports;

class DoctorWiseReportService
{
    public function getDoctorWiseReport(array $filters): array
    {
        // Fetch doctor-wise treatment report
        $query = \App\Models\PatientTreatmentsDone::query()
            ->join('Patient', 'Patient.PatientID', '=', 'PatientTreatmentsDone.PatientID')
            ->join('Provider', 'Provider.ProviderID', '=', 'PatientTreatmentsDone.ProviderID')
            ->leftJoin('PatientTreatmentTypeDone', 'PatientTreatmentTypeDone.PatientTreatmentDoneID', '=', 'PatientTreatmentsDone.PatientTreatmentDoneID')
            ->leftJoin('TreatmentTypeHierarchy', 'TreatmentTypeHierarchy.TreatmentTypeID', '=', 'PatientTreatmentTypeDone.TreatmentTypeID')
            ->select([
                'PatientTreatmentsDone.TreatmentDate',
                'Patient.Title',
                'Patient.FirstName',
                'Patient.LastName',
                'TreatmentTypeHierarchy.Title as TreatmentType',
                'PatientTreatmentsDone.TreatmentCost as TotalCost',
                'Provider.ProviderName as DoctorName',
                'PatientTreatmentsDone.TreatmentTotalCost',
            ]);

        if (!empty($filters['start_date'])) {
            $query->whereDate('PatientTreatmentsDone.TreatmentDate', '>=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $query->whereDate('PatientTreatmentsDone.TreatmentDate', '<=', $filters['end_date']);
        }

        $results = $query->orderBy('PatientTreatmentsDone.TreatmentDate', 'desc')->get();

        // Group by TreatmentDate, then by PatientName
        $grouped = [];
        foreach ($results as $row) {
            $date = $row->TreatmentDate ? $row->TreatmentDate->format('Y-m-d') : null;
            $patientName = trim(trim($row->Title) . ' ' . trim($row->FirstName) . ' ' . trim($row->LastName));
            if (!$date) continue;
            if (!isset($grouped[$date])) {
                $grouped[$date] = [];
            }
            if (!isset($grouped[$date][$patientName])) {
                $grouped[$date][$patientName] = [];
            }
            $grouped[$date][$patientName][] = [
                'TreatmentType' => $row->TreatmentType,
                'TotalCost' => $row->TotalCost,
                'DoctorName' => $row->DoctorName,
                'TreatmentTotalCost' => $row->TreatmentTotalCost,
            ];
        }
        return $grouped;
    }
}
