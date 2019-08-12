<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    //
    protected $table = "subjects";
    public $timestamps = false;
    protected $fillable = ['name', 'number'];

    public function studentsubject()
    {
        return $this->hasMany('App\StudentSubjectModel');
    }

    public function students()
    {
        return $this->belongsToMany(StudentModel::class, 'students_subjects', 'subject_code', 'student_code');
    }
}
