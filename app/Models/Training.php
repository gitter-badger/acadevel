<?php

namespace App\Models;

use App\Models\Exam\Exam;
use App\Models\Question\Question;
use Illuminate\Database\Eloquent\Model;


class Training extends Model
{
    protected $fillable = ['name'];

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
