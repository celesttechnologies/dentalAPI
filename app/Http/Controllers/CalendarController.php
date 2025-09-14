<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CalendarService;
use App\Http\Requests\CalendarRequest;
// use App\Http\Requests\CalendarAddAppointmentRequest;
use App\Services\AppointmentService;
use Exception;
use Illuminate\Support\Facades\Log;

class CalendarController extends Controller
{
    use ApiResponse;
    protected $calendarService;

    public function __construct(CalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }

    /**
     * @group Calendar
     *
     * @method GET
     *
     * GetAllAppointments calendar
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllAppointments(CalendarRequest $request, $doctorId = null)
    {
        try {
            $appointments = $this->calendarService->getAppointments($request->all(), $doctorId);
            return $this->successResponse(['appointments' => $appointments]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    /**
     * @group Calendar
     *
     * @method DELETE
     *
     * Delete a calendar
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the calendar to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->calendarService->deleteAppointment($id);
            if (!$deleted) {
                return response()->json(['error' => 'Appointment not found'], 404);
            }
            return response()->json(['message' => 'Appointment deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to delete appointment',
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
