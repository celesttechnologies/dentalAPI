<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyNewPatientAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $today = now()->format('Y-m-d');
        $filters = [
            'start_date' => $request->input('start_date', $today),
            'end_date' => $request->input('end_date', $today),
            'doctor_id' => $request->input('doctor_id', 'all'),
            'time_shift' => $request->input('time_shift', 'all'),
        ];

        $service = app(\App\Services\Reports\DailyNewPatientAttendanceService::class);
        $data = $service->getDailyNewPatientList($filters);

        return response()->json(['data' => $data]);
    }
}
