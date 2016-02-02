<?php

namespace App\Models\Question;

use Jenssegers\Mongodb\Model as Eloquent;

class Group extends Eloquent
{
    protected $fillable = ['name'];

   public function questions()
   {
       return $this->embedsMany(Question::class);
   }
}