<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['text', 'isCorrect'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
