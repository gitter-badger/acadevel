<?php

namespace App\Models;

use App\Models\Exam\Exam;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['name'];
    protected $table = "training";

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function getSlug()
    {
        return str_slug($this->name);
    }

}
