<?php

namespace App\Services\Reports;

use Illuminate\Support\Facades\DB;

class WorkReportService
{
    public function getWorkReport(array $filters): array
    {
        $start = $filters['start_date'] ?? null;
        $end = $filters['end_date'] ?? null;
        $doctorIds = $filters['doctor_ids'] ?? [];
        $treatments = $filters['treatments'] ?? [];
        $query = \App\Models\PatientTreatmentsDone::query()
            ->join('PatientTreatmentTypeDone as pttd', 'PatientTreatmentsDone.PatientTreatmentDoneID', '=', 'pttd.PatientTreatmentDoneID')
            ->join('TreatmentTypeHierarchy as tth', 'pttd.TreatmentTypeID', '=', 'tth.TreatmentTypeID')
            ->whereBetween('PatientTreatmentsDone.TreatmentDate', [$start, $end]);

        if (!empty($doctorIds)) {
            $query->whereIn('PatientTreatmentsDone.ProviderID', $doctorIds);
        }

        if (!empty($treatments)) {
            $query->whereIn('pttd.TreatmentTypeID', $treatments);
        }

        $results = $query
            ->groupBy('pttd.TreatmentTypeID')
            ->select([
                'pttd.TreatmentTypeID as treatment_type_id',
                'tth.Title as treatment_type_title',
                DB::raw('COUNT(*) as treatment_count'),
                DB::raw('SUM(pttd.TreatmentCost) as total_cost'),
                DB::raw('SUM(pttd.Discount) as total_discount'),
            ])
            ->get();

        return $results->toArray();
    }
}
