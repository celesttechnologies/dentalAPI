<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorWiseReportController extends Controller
{
    public function index(Request $request)
    {
        $today = now()->format('Y-m-d');
        $filters = [
            'start_date' => $request->input('start_date', $today),
            'end_date' => $request->input('end_date', $today),
        ];

        $service = app(\App\Services\Reports\DoctorWiseReportService::class);
        $data = $service->getDoctorWiseReport($filters);

        return response()->json(['data' => $data]);
    }
}
