<?php

namespace App\Models\Exam;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "exam_attendee_question";

    public function exam()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function attendee_questions() {
        return $this->belongsToMany(\App\Models\Question\Question::class);
    }

    public function getScore()
    {
        return 100;
    }

    public function getPassed()
    {
        return $this->score >= 50;
    }
}
