<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['text', 'correct'];
}
