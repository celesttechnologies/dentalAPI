<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Services\ReminderService;

class ReminderController extends Controller
{
    // public function __construct(private ReminderService $reminderService)
    // {
    // }

    public function fetchBirthdayReminders(Request $request)
    {
        // $result = $this->reminderService->sendBirthdayReminders();
        return response()->json(['success' => true]);
    }

    public function fetchCheckupReminders(Request $request)
    {
        // $result = $this->reminderService->sendCheckupReminders();
        return response()->json(['success' => true]);
    }

    public function fetchAllPatientReminders(Request $request)
    {
        // $message = $request->input('message');
        // if (!$message) {
        //     return response()->json(['success' => false, 'message' => 'A message is required.'], 400);
        // }
        // $result = $this->reminderService->sendAllPatientReminders($message);
        return response()->json(['success' => true]);
    }
}