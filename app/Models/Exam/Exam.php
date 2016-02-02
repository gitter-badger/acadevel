<?php

namespace App\Models\Exam;

use App\Models\Attendee;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $incrementing = false;
    public function attendees()
    {
        $this->hasMany(Attendee::class);
    }

}