<?php

namespace App\Models;

use App\Models\Exam\ExamAnswer;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['firstname', 'lastname', 'company'];

    public function answers()
    {
        return $this->hasMany(ExamAnswer::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}