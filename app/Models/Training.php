<?php

namespace App\Models;

use App\Models\Exam\Exam;
use App\Models\Question\Question;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['name', 'maxAttendees'];

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        self::saving(function ($training) {
            $training->slug = str_slug($training->name);
        });
    }
}
