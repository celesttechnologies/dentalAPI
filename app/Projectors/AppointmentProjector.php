<?php

namespace App\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use App\Events\AppointmentCreated;
use App\Models\Appointment;

class AppointmentProjector extends Projector
{
  public function onAppointmentCreated(AppointmentCreated $event)
  {
    Appointment::create([
      'AppointmentID' => $event->appointmentId,
      'PatientID' => $event->input[''],
      'ProviderID' => $event->input[''],
      'PatientName' => $event->input[''],
    ]);
  }
}
