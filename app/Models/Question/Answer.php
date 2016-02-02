<?php

namespace App\Models\Question;

use Jenssegers\Mongodb\Model as Eloquent;

class Answer extends Eloquent
{
    protected $fillable = ['text', 'correct'];
}