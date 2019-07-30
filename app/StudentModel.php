<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = "students";
    public $timestamps = false;
    protected $guarded = ['id'];
    public function ClassM(){
        return $this->belongsTo('App\ClassModel', 'class_code', 'id');
    }
    public function studentSubjects(){
        return $this->hasMany(StudentSubjectModel::class,'student_code','id');
    }
    public function subjects()
    {
        return $this->belongsToMany(SubjectModel::class, 'students_subjects', 'student_code', 'subject_code')->withPivot('score');
    }
}
