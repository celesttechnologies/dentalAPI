<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use Carbon\Carbon;
use App\Traits\ApiResponse;

/**
 * @group Home
 *
 * Home Dashboard and Calendar APIs
 */
class HomeController extends Controller
{
    use ApiResponse;

    /**
     * @group Home
     *
     * @method GET
     *
     * Home home
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $today = Carbon::today();

        // Patients
        $totalPatients = Patient::count();
        $activePatients = Patient::where('Status', 'Active')->count();
        $newPatients = Patient::whereDate('AddedOn', $today)->count();
        $archivedPatients = Patient::where('Status', 'Archived')->count();

        // Appointments
        $totalAppointments = Appointment::whereDate('StartDateTime', $today)->count();
        $upcomingAppointments = Appointment::whereDate('StartDateTime', $today)->where('Status', 'Upcoming')->count();
        $cancelledAppointments = Appointment::whereDate('StartDateTime', $today)->where('Status', 'Cancelled')->count();

        // Lab Work (placeholder)
        $labWork = [
            'total' => 0,
            'completed' => 0,
            'wip' => 0,
            'dispatched' => 0,
        ];

        // Reports (placeholder)
        $reports = [
            'total' => 0,
            'completed' => 0,
            'wip' => 0,
        ];

        return $this->successResponse([
            'patients' => [
                'total' => $totalPatients,
                'active' => $activePatients,
                'new' => $newPatients,
                'archived' => $archivedPatients,
            ],
            'appointments' => [
                'total' => $totalAppointments,
                'upcoming' => $upcomingAppointments,
                'cancelled' => $cancelledAppointments,
            ],
            'lab_work' => $labWork,
            'reports' => $reports,
        ]);
    }

    /**
     * @group Home
     *
     * @method GET
     *
     * CalendarStats home
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function calendarStats(Request $request)
    {
        $month = $request->query('month', Carbon::today()->format('Y-m'));
        $startOfMonth = Carbon::parse($month . '-01')->startOfMonth();
        $endOfMonth = Carbon::parse($month . '-01')->endOfMonth();

        // Appointments grouped by date with count
        $appointments = Appointment::selectRaw('DATE(StartDateTime) as date, COUNT(*) as count')
            ->whereBetween('StartDateTime', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->pluck('count', 'date');

        // Patient birthdays grouped by date with count
        $currentYear = Carbon::now()->year;
        $birthdays = Patient::selectRaw("DATE(CONCAT($currentYear, '-', LPAD(MONTH(DOB), 2, '0'), '-', LPAD(DAY(DOB), 2, '0'))) as date, COUNT(*) as count")
            ->whereMonth('DOB', $startOfMonth->month)
            ->groupBy('date')
            ->pluck('count', 'date');

        return $this->successResponse([
            'month' => $month,
            'appointments_by_date' => $appointments,
            'patient_birthdays_by_date' => $birthdays,
        ]);
    }
}
