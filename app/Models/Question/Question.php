<?php

namespace App\Models\Question;

use App\Models\Question\Answer;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $incrementing = false;
    protected $fillable = ['text'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}