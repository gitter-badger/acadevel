<?php

namespace App\Models\Exam;

use App\Models\Training;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = "exam_attendee";

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function attendee()
    {
        return $this->belongsTo(\App\Models\Attendee::class);
    }
}
