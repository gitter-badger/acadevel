<?php

namespace App\Models\Exam;

use App\Models\Attendee;
use Jenssegers\Mongodb\Model as Eloquent;

class Exam extends Eloquent
{
    public function attendees()
    {
        $this->embedsMany(Attendee::class);
    }

}