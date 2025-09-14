<?php

namespace App\Services\Reports;

use Illuminate\Support\Facades\DB;

class DoctorIncentiveReportService
{
    public function getDoctorIncentiveReport(array $filters): array
    {
        $startDate = $filters['start_date'] ?? null;
        $endDate = $filters['end_date'] ?? null;
        $providerIds = $filters['provider_ids'] ?? [];
        $treatmentTypeIds = $filters['treatment_type_ids'] ?? [];

        $query = \App\Models\PatientTreatmentsDone::query()
            ->join('PatientTreatmentTypeDone as pttd', 'PatientTreatmentsDone.PatientTreatmentDoneId', '=', 'pttd.PatientTreatmentDoneId')
            ->join('TreatmentTypeHierarchy as tth', 'pttd.TreatmentTypeID', '=', 'tth.TreatmentTypeID')
            ->select(
                'tth.Title as TreatmentType',
                DB::raw('COUNT(PatientTreatmentsDone.PatientTreatmentDoneId) as NumberOfTreatments'),
                DB::raw('SUM(PatientTreatmentsDone.TreatmentTotalCost) as TotalCost'),
                DB::raw('SUM(PatientTreatmentsDone.TreatmentDiscount) as Discount')
            )
            ->whereBetween('PatientTreatmentsDone.TreatmentDate', [$startDate, $endDate]);

        if (!empty($providerIds)) {
            $query->whereIn('PatientTreatmentsDone.ProviderID', $providerIds);
        }
        if (!empty($treatmentTypeIds)) {
            $query->whereIn('pttd.TreatmentTypeID', $treatmentTypeIds);
        }

        $query->groupBy('tth.Title');

        return $query->get()->toArray();
    }
}
