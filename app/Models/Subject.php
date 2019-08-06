<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";

    protected $fillable = ['name','number'];

    public function students()
    {
        return $this->belongstoMany(Student::class,'students_subjects','subject_code','student_code')->withPivot('score');
    }
}

