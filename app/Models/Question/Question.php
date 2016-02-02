<?php

namespace App\Models\Question;

use App\Models\Question\Answer;
use Jenssegers\Mongodb\Model as Eloquent;

class Question extends Eloquent
{
    protected $fillable = ['text'];

    public function answers()
    {
        return $this->embedsMany(Answer::class);
    }
}