<?php

namespace App\Models;

use App\Models\Exam\ExamAnswer;
use Jenssegers\Mongodb\Model as Eloquent;

class Attendee extends Eloquent
{
    protected $fillable = ['firstname', 'lastname', 'company'];

    public function answers()
    {
        return $this->embedsMany(ExamAnswer::class);
    }

}