<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingReportController extends Controller
{
    public function credit(Request $request)
    {
        $today = now()->format('Y-m-d');
        $filters = [
            'start_date' => $request->input('start_date', $today),
            'end_date' => $request->input('end_date', $today),
        ];

        $service = app(\App\Services\Reports\BillingReportService::class);
        $data = $service->getCreditReport($filters);

        return response()->json(['data' => $data]);
    }

    public function debit(Request $request)
    {
        $today = now()->format('Y-m-d');
        $filters = [
            'start_date' => $request->input('start_date', $today),
            'end_date' => $request->input('end_date', $today),
        ];

        $service = app(\App\Services\Reports\BillingReportService::class);
        $data = $service->getDebitReport($filters);

        return response()->json(['data' => $data]);
    }
}
