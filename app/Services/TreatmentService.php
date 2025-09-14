<?php

namespace App\Services;

use App\Http\Resources\PatientTreatmentResource;
use App\Models\PatientTreatmentsDone;
use Illuminate\Support\Carbon;

class TreatmentService
{
    public function getOngoingTreatmentsForToday($doctorIds = [])
    {
        $today = Carbon::today()->toDateString();
        $appointments = PatientTreatmentsDone::when(!empty($doctorIds), function ($query) use ($doctorIds) {
            $query->whereIn('ProviderID', $doctorIds);
        })
        ->whereDate('TreatmentDate', $today)
        ->where('IsCompleted', 0)
        ->get();

        $appointmentsCount = $appointments->count();

        return ['count' => $appointmentsCount, 'list' => PatientTreatmentResource::collection($appointments)];
    }

    public function getCompletedTreatmentsForToday($doctorIds = [])
    {
        $today = Carbon::today()->toDateString();
        $appointments = PatientTreatmentsDone::when(!empty($doctorIds), function ($query) use ($doctorIds) {
            $query->whereIn('ProviderID', $doctorIds);
        })
        ->whereDate('TreatmentDate', $today)
        ->where('IsCompleted', 1)
        ->get();

        $appointmentsCount = $appointments->count();

        return ['count' => $appointmentsCount, 'list' => PatientTreatmentResource::collection($appointments)];
    }
}
