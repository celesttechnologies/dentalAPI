<?php

namespace App\Services\Reports;

use Illuminate\Support\Facades\DB;

class WaitingAreaReportService
{
    public function getWaitingAreaReport(array $filters): array
    {
        // Assuming Eloquent models: WaitingAreaPatient, Patient, Appointment, PatientTreatmentsDone, Provider
        $query = \App\Models\WaitingAreaPatient::query()
            ->leftJoin('patients', 'WaitingAreaPatient.PatientID', '=', 'Patient.PatientID')
            ->leftJoin('Appointments', 'WaitingAreaPatient.AppointmentID', '=', 'Appointments.id')
            ->leftJoin('PatientTreatmentsDone', 'WaitingAreaPatient.id', '=', 'PatientTreatmentsDone.WaitingAreaID')
            ->leftJoin('Provider', 'WaitingAreaPatient.ProviderID', '=', 'Provider.id')
            ->select([
                'WaitingAreaPatient.ArrivalTime as ArrivalDate',
                'Patient.CaseID',
                'Patient.Title',
                'Patient.FirstName',
                'Patient.LastName',
                'Provider.ProviderName',
                'Patient.PatientName',
                DB::raw("IF(WaitingAreaPatient.AppointmentID IS NULL, 'Direct Checkin', Appointments.ScheduledAppointmentTime) as AppointmentTime"),
                DB::raw('TIME(WaitingAreaPatient.ArrivalTime) as ArrivalTime'),
                'WaitingAreaPatient.WaitTime',
                'PatientTreatmentsDone.TreatmentDate',
                'PatientTreatmentsDone.CompletionTime',
                'PatientTreatmentsDone.IsCompleted',
            ]);

            if (!empty($filters['start_date'])) {
                $query->whereDate('WaitingAreaPatient.ArrivalTime', '>=', $filters['start_date']);
            }
            if (!empty($filters['end_date'])) {
                $query->whereDate('WaitingAreaPatient.ArrivalTime', '<=', $filters['end_date']);
            }
            if (!empty($filters['doctor_id'])) {
                $query->where('WaitingAreaPatient.ProviderID', '=', $filters['doctor_id']);
            }

        return $query->get()->toArray();
    }
}
