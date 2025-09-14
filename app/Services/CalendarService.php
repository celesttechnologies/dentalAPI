<?php

namespace App\Services;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Str;

class CalendarService
{
    public function getAppointments(array $filters, $doctorId = null)
    {
        try {
            $date = $filters['date'] ?? null;
            $period = $filters['period'] ?? 'day';


            $query = Appointment::query();

            if ($doctorId) {
                $query->where('ProviderID', $doctorId);
            }

            if ($date) {
                $carbonDate = Carbon::parse($date);
                switch ($period) {
                    case 'week':
                        $query->whereBetween('StartDateTime', [
                            $carbonDate->copy()->startOfWeek()->startOfDay(),
                            $carbonDate->copy()->endOfWeek()->endOfDay()
                        ]);
                        break;
                    case 'month':
                        $query->whereBetween('StartDateTime', [
                            $carbonDate->copy()->startOfMonth()->startOfDay(),
                            $carbonDate->copy()->endOfMonth()->endOfDay()
                        ]);
                        break;
                    default:
                        $query->whereDate('StartDateTime', $carbonDate);
                        break;
                }
            }
            return $query->get();
        } catch (Exception $e) {
            Log::error('Error fetching appointments: ' . $e->getMessage(), [
                'filters' => $filters,
                'doctorId' => $doctorId
            ]);

            // Return a meaningful error response
            return response()->json([
                'error' => 'Unable to fetch appointments. Please try again later.'
            ], 500);
        }
    }

    public function createAppointment(array $data)
    {
        try {
            $appointment = new Appointment();
            $appointment->AppointmentID = Str::uuid(); // Correct column name
            $appointment->ProviderID = $data['ProviderID'];
            $appointment->StartDateTime = $data['StartDateTime'];
            $appointment->EndDateTime = $data['EndDateTime'];
            $appointment->PatientName = $data['patient_name'];
            $appointment->Comments = $data['notes'] ?? null;
            $appointment->save();

            return $appointment;
        } catch (Exception $e) {
            Log::error('Error in creating appointment: ' . $e->getMessage());
            throw new Exception('Could not create appointment.');
        }
    }

    public function deleteAppointment($appointmentId)
    {
        try {
            $appointment = Appointment::where('AppointmentID', $appointmentId)->first();

            if (!$appointment) {
                return false; // Return false if no record is found
            }

            $appointment->delete(); // Perform soft delete (if enabled)
            return true;
        } catch (Exception $e) {
            throw new Exception("Error deleting appointment: " . $e->getMessage());
        }
    }
}
