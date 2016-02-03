<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['firstname', 'lastname', 'company'];
    protected $table = "attendee";

    public function exams()
    {
        return $this->belongsToMany(Exam\Attendee::class);
    }
}
