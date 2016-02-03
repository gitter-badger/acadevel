<?php

namespace App\Models\Question;

use App\Models\Exam\Attendee;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text', 'tags'];
    protected $table = "question";

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function attendee_questions() {
        return $this->belongsToMany(Attendee::class);
    }
}
