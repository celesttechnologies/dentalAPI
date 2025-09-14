<?php

namespace App\Aggregates;

use Spatie\EventSourcing\AggregateRoots\AggregateRoot;
use App\Events\AppointmentCreated;

class AppointmentAggregate extends AggregateRoot
{
  public function createAppointment($appointmentId, $input)
  {
    $this->recordThat(new AppointmentCreated($appointmentId, $input));
    return $this;
  }
}
