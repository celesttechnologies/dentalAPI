<?php

namespace App\Services;

use App\Http\Resources\AppointmentResource;
use App\Http\Resources\TreatmentResource;
use App\Models\Appointment;
use App\Models\Patient;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentService
{
    public function getAppointments($patientId, int $perPage)
    {
        $appointments = Appointment::when($patientId, function ($query) use ($patientId) {
            $query->where('PatientID', $patientId);
        })->paginate($perPage);

        return [
            'appointments' => $appointments, // Transform the data using the resource
            'pagination' => [
                'current_page' => $appointments->currentPage(),
                'per_page' => $appointments->perPage(),
                'total' => $appointments->total(),
                'last_page' => $appointments->lastPage(),
            ]
        ];
    }

    public function getAppointmentsForToday($doctorIds = [])
    {
        $today = Carbon::today()->toDateString();
        $appointments = Appointment::when(!empty($doctorIds), function ($query) use ($doctorIds) {
            $query->whereIn('ProviderID', $doctorIds);
        })->whereDate('StartDateTime', $today)->where('MovedToWaitingArea', 0)->whereNull('ArrivalTime')->get();

        $appointmentsCount = $appointments->count();

        return ['count' => $appointmentsCount, 'list' => AppointmentResource::collection($appointments)];
    }

    public function getAppointmentsByStatus()
    {
        $appointments = Appointment::where('Status', 'Scheduled')
        ->get();

        return $appointments;
    }

    public function getTreatment($status)
    {
        // Eager-load the provider relationship, selecting only specific columns from provider
        $treatments = Appointment::where('Status', '=', $status)->get();

        return $treatments;
    }

    /**
     * Create a new appointment record.
     *
     * @param array $data The validated data for creating the appointment
     * @return Appointment The newly created appointment model
     */
    public function createAppointment(array $data): Appointment
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

                $data['Title'] = $patient->Title;
                $data['FirstName'] = $patient->FirstName;
                $data['LastName'] = $patient->LastName;
                $data['Gender'] = $patient->Gender;
                $data['Nationality'] = $patient->Nationality;
                $data['Mobile'] = $patient->MobileNumber;
                $data['Age'] = $patient->Age;
            }

            $data['PatientID'] = $patient->PatientID;
            
            $appointment = Appointment::create([
                'ClinicID' => $user->ClinicID,
                'PatientID' => $data['PatientID'],
                'ProviderID' => $data['ProviderID'],
                'StartDateTime' => $data['StartDateTime'],
                'EndDateTime' => $data['EndDateTime'],
                'Comments' => $data['Comments'] ?? null,
                'PatientTitle' => $data['Title'],
                'PatientFirstName' => $data['FirstName'],
                'PatientLastName' => $data['LastName'],
                'PatientGender' => $data['Gender'],
                'PatientAge' => $data['Age'],
                'PatientNationality' => $data['Nationality'],
                'PatientPhone' => $data['Mobile'],
                'Status' => $data['Status'],
                'PatientName' => "{$data['Title']} {$data['FirstName']} {$data['LastName']}",
            ]);

            return $appointment;
        });
    }

    /**
     * Update an existing appointment record.
     *
     * @param Appointment $appointment The appointment model to update
     * @param array $data The validated data for updating the appointment
     * @return Appointment The updated appointment model
     */
    public function updateAppointment(Appointment $appointment, array $data): Appointment
    {
        $appointment->update($data);
        $appointment->fresh();

        return $appointment;
    }
}
