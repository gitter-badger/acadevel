<?php

namespace App\Models\Exam;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "exam_attendee_question_anser";

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function origin()
    {
        return $this->belongsTo(\App\Models\Question\Answer::class);
    }
}
