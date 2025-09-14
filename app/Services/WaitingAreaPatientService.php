<?php

namespace App\Services;

use App\Http\Resources\WaitingAreaPatientResource;
use App\Models\Patient;
use App\Models\WaitingAreaPatient;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaitingAreaPatientService
{
    public function getWaitingAreaForToday($doctorIds = [])
    {
        $today = Carbon::today()->toDateString();
        $appointments = WaitingAreaPatient::when(!empty($doctorIds), function ($query) use ($doctorIds) {
            $query->whereIn('ProviderID', $doctorIds);
        })->whereDate('StartDateTime', $today)->where('MovedToTreatmentArea', 0)->get();

        $appointmentsCount = $appointments->count();

        return ['count' => $appointmentsCount, 'list' => WaitingAreaPatientResource::collection($appointments)];
    }

    public function getWaitingAreaList()
    {
        $appointments = WaitingAreaPatient::with('provider:ProviderID,ProviderName,Location,Email')
        ->select(['WaitingAreaID', 'PatientID', 'StartDateTime', 'EndDateTime', 'PatientName', 'Status', 'CompleteTime', 'ProviderID'])
        ->get();

        return WaitingAreaPatientResource::collection($appointments);
    }

    public function createWaitingAreaPatient(array $data): WaitingAreaPatient
    {
        $user = Auth::user();
        return DB::transaction(function() use ($data, $user) {
            if(!$data['IsExistingPatient']) {
                $lastRecord = Patient::orderBy('CaseID', 'desc')->first();
                $patient = Patient::create([
                    'ProviderID' => $data['ProviderID'],
                    'ClinicID' => $user->ClinicID,
                    'Title' => $data['Title'],
                    'FirstName' => $data['FirstName'],
                    'LastName' => $data['LastName'],
                    'Gender' => $data['Gender'],
                    'Age' => $data['Age'],
                    'Nationality' => $data['Nationality'],
                    'MobileNumber' => $data['Mobile'],
                    'CaseID' => $lastRecord ? $lastRecord->CaseID + 1 : 1,
                    'PatientCode' => $lastRecord ? 'P' . $lastRecord->CaseID + 1 : 'P1',
                    'AddressLine1' => '',
                    'City' => '',
                    'State' => '',
                    'Country' => 0,
                ]);
            } else {
                $patient = Patient::where('PatientID', $data['PatientID'])->first();
                
                if (!$patient) {
                    throw new Exception('Patient not found');
                }
            }

            $data['PatientID'] = $patient->PatientID;
            $data['PatientName'] = trim($patient->Title . ' ' . $patient->FirstName . ' ' . $patient->LastName);
            $data['Mobile'] = $patient->MobileNumber;
            $data['ArrivalTime'] = $data['ArrivalTime'] ?? Carbon::now()->toDateTimeString();
            $lastRecord = WaitingAreaPatient::orderBy('TokenNumber', 'desc')->first();
            $waitingArea = WaitingAreaPatient::create([
                'ClinicID' => $user->ClinicID,
                'PatientID' => $data['PatientID'],
                'AppointmentID' => $data['AppointmentID'] ?? null,
                'ProviderID' => $data['ProviderID'],
                'PatientName' => $data['PatientName'],
                'StartDateTime' => $data['StartDateTime'] ?? $data['ArrivalTime'],
                'EndDateTime' => $data['EndDateTime'] ?? null,
                'Comments' => $data['Comments'] ?? null,
                'ReminderDate' => $data['ReminderDate'] ?? null,
                'CancelledOn' => $data['CancelledOn'] ?? null,
                'CancelledBy' => $data['CancelledBy'] ?? null,
                'CancellationReason' => $data['CancellationReason'] ?? null,
                'CancellationType' => $data['CancellationType'] ?? null,
                'ArrivalTime' => $data['ArrivalTime'] ?? null,
                'OperationTime' => $data['OperationTime'] ?? null,
                'CompleteTime' => $data['CompleteTime'] ?? null,
                'PatientPhone' => $data['Mobile'] ?? null,
                'Status' => $data['Status'] ?? 1,
                'TokenNumber' => $lastRecord ? $lastRecord->TokenNumber + 1 : 1,
                'IsDeleted' => $data['IsDeleted'] ?? 0,
                'WaitTime' => $data['WaitTime'] ?? null,
                'ChairID' => $data['ChairID'] ?? null,
                'CreatedOn' => Carbon::now(),
                'CreatedBy' => $data['CreatedBy'] ?? 'System',
                'LastUpdatedOn' => Carbon::now(),
                'LastUpdatedBy' => $data['UpdatedBy'] ?? 'System',
            ]);

            return $waitingArea;
        });
    }

    public function updateWaitingAreaPatient(WaitingAreaPatient $request, array $data): WaitingAreaPatient
    {
        $request->update($data);
        $request->fresh();

        return $request;
    }
}
