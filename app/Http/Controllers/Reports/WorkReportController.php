<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkReportController extends Controller
{
    public function index(Request $request)
    {
        $today = now()->format('Y-m-d');
        $filters = [
            'start_date' => $request->input('start_date', $today),
            'end_date' => $request->input('end_date', $today),
            // if doctor_ids not sent, keep null; otherwise normalize into array or 'all'
            'doctor_ids' => $request->has('doctor_ids') ? $this->parseArrayQueryParam($request->input('doctor_ids')) : null,
            // normalize treatments into either the string 'all' or an array of ids
            'treatments' => $request->has('treatments') ? $this->parseArrayQueryParam($request->input('treatments')) : null,
        ];

        $service = app(\App\Services\Reports\WorkReportService::class);
        $data = $service->getWorkReport($filters);

        return response()->json(['data' => $data]);
    }

    /**
     * Accepts multiple formats for a query parameter and returns either 'all' or an array.
     * Supported inputs:
     * - null -> 'all'
     * - array -> returned as-is
     * - JSON array string (single or double quotes) -> parsed
     * - CSV string -> split by comma
     * - single scalar value -> returned as single-item array
     */
    private function parseArrayQueryParam($value)
    {
        if (is_array($value)) {
            return array_values($value);
        }

        if (is_null($value) || $value === '' ) {
            return 'all';
        }

        // If value looks like a JSON array, try to decode it. Allow single quotes by normalizing.
        $trim = trim($value);
        if ((Str::startsWith($trim, '[') && Str::endsWith($trim, ']')) || Str::startsWith($trim, '{')) {
            // replace single quotes with double to handle inputs like `['a','b']`
            $json = str_replace("'", '"', $trim);
            $decoded = json_decode($json, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return array_values($decoded);
            }
        }

        // If comma-separated
        if (strpos($value, ',') !== false) {
            return array_values(array_filter(array_map('trim', explode(',', $value))));
        }

        // single scalar value
        return [$value];
    }
}
