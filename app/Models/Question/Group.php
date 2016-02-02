<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $incrementing = false;
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
