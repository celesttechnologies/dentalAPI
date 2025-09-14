<?php

namespace App\Services;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ReminderService
{
    public function sendBirthdayReminders()
    {
        $today = Carbon::today();
        $patients = Patient::whereMonth('DOB', $today->month)
                           ->whereDay('DOB', $today->day)
                           ->get();

        $count = 0;
        foreach ($patients as $patient) {
            // Logic to send reminder (e.g., email, SMS)
            // For now, we'll just log it
            Log::info("Sending birthday reminder to {$patient->FirstName} {$patient->LastName}");
            $count++;
        }

        return ['success' => true, 'message' => "Sent {$count} birthday reminders."];
    }

    public function sendCheckupReminders()
    {
        // Example: Remind patients whose last checkup was 6 months ago
        $sixMonthsAgo = Carbon::today()->subMonths(6);
        // This requires a 'last_checkup_date' column on the patients table.
        // As an example, we'll assume it exists.
        if (!Schema::hasColumn('patients', 'last_checkup_date')) {
             return ['success' => false, 'message' => 'last_checkup_date column not found on patients table.'];
        }
        $patients = Patient::whereDate('last_checkup_date', '<=', $sixMonthsAgo)->get();

        $count = 0;
        foreach ($patients as $patient) {
            Log::info("Sending checkup reminder to {$patient->FirstName} {$patient->LastName}");
            $count++;
        }

        return ['success' => true, 'message' => "Sent {$count} checkup reminders."];
    }

    public function sendAllPatientReminders($message)
    {
        $patients = Patient::all();
        $count = 0;
        foreach ($patients as $patient) {
            Log::info("Sending message to {$patient->FirstName} {$patient->LastName}: {$message}");
            $count++;
        }

        return ['success' => true, 'message' => "Sent reminders to {$count} patients."];
    }
}
