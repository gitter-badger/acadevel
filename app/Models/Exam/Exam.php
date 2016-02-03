<?php

namespace App\Models\Exam;

use App\Models\Training;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['date_start', 'date_end', 'completed_at'];
    protected $table = "exam";

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
}
