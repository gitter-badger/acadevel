<?php

namespace App\Models;

use App\Models\Exam\Exam;
use Jenssegers\Mongodb\Model as Eloquent;

class Training extends Eloquent
{

    protected $collection = 'training';
    protected $fillable = ['name'];

    public function attendees()
    {
        return $this->embedsMany(Attendee::class);
    }

    public function exam()
    {
        return $this->embedsOne(Exam::class);
    }


}