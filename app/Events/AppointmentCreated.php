<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class AppointmentCreated extends ShouldBeStored
{
    public $appointmentId;
    public $input;

    public function __construct($appointmentId, $input)
    {
        $this->appointmentId = $appointmentId;
        $this->input = $input;
    }
}
