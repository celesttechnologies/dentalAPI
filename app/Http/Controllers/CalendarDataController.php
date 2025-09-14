<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalendarDataController extends Controller
{
    /**
     * Return calendar formatted appointments with optional filters:
     * - doctors (array or CSV)
     * - patients (array or CSV)
     * - start_date, end_date (Y-m-d)
     */
    public function index(Request $request)
    {
        // start_date and end_date are required for the calendar; default to today when not provided
        $today = now()->format('Y-m-d');
        $start = $request->query('start_date', $today);
        $end = $request->query('end_date', $today);

        $doctors = $this->parseArrayQueryParam($request->query('doctors'));
        $patients = $this->parseArrayQueryParam($request->query('patients'));

        $query = Appointment::query()
            ->select([
                'Appointments.AppointmentID as AppointmentID',
                'Patient.FirstName as patient_first_name',
                'Patient.LastName as patient_last_name',
                'Appointments.PatientID as patient_id',
                'Appointments.Status as status',
                'Appointments.StartDateTime as start',
                'Appointments.EndDateTime as end',
                'Patient.Gender as gender',
                'Patient.Age as age',
                'Patient.PhoneNumber as phone',
                'Patient.MobileNumber as mobile',
                'Patient.EmailAddress1 as email',
                'Appointments.Comments as notes',
                'Patient.Title as patient_title',
                'Patient.FirstName as patient_first_name',
                'Patient.LastName as patient_last_name',
                // 'Patient.Imagethumbnail as patient_img_thumbnail',
                'Patient.ImagePath as patient_img',
                'Provider.ProviderID as provider_id',
                'Provider.ProviderName as provider_name',
                'Provider.Category as provider_designation',
                'Provider.PhoneNumber as provider_phone',
                DB::raw('NULL as provider_mobile'),
            ])
                ->leftJoin('Provider', 'Appointments.ProviderID', '=', 'Provider.ProviderID')
                ->leftJoin('Patient', 'Appointments.PatientID', '=', 'Patient.PatientID');

        if ($start) {
            $query->whereDate('Appointments.StartDateTime', '>=', $start);
        }
        if ($end) {
            $query->whereDate('Appointments.EndDateTime', '<=', $end);
        }

        if (is_array($doctors)) {
            $query->whereIn('Appointments.ProviderID', $doctors);
        }

        if (is_array($patients)) {
            $query->whereIn('Appointments.PatientID', $patients);
        }

        $rows = $query->get()->map(function ($row) {
            $patientName = trim((
                ($row->patient_title ?? '') . ' ' . 
                ($row->patient_first_name ?? '') . ' ' . ($row->patient_last_name ?? '')
            ));


            return [
                'id' => $row->id,
                'patient_name' => $patientName,
                'patient_id' => $row->patient_id,
                'status' => $row->status,
                'start' => $row->start,
                'end' => $row->end,
                'gender' => $row->gender,
                'age' => $row->age,
                'phone' => $row->phone,
                'mobile' => $row->mobile,
                'email' => $row->email,
                'treatment_type' => null,
                'treatment_description' => null,
                'patient_img' => $row->patient_img,
                'treatement' => null,
                'notes' => $row->notes,
                'patient_type' => $row->patient_type,
                'provider' => [
                    'id' => $row->provider_id,
                    'name' => $row->provider_name,
                    'designation' => $row->provider_designation,
                    'phone' => $row->provider_phone,
                    'mobile' => $row->provider_mobile,
                ],
            ];
        });

        return response()->json(['data' => $rows]);
    }

    private function parseArrayQueryParam($value)
    {
        if (is_array($value)) return array_values($value);
        if (is_null($value) || $value === '') return null;
        $trim = trim($value);
        if (Str::startsWith($trim, '[') && Str::endsWith($trim, ']')) {
            $json = str_replace("'", '"', $trim);
            $decoded = json_decode($json, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) return array_values($decoded);
        }
        if (strpos($value, ',') !== false) return array_values(array_filter(array_map('trim', explode(',', $value))));
        return [$value];
    }
}
