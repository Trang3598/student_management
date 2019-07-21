<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubjectModel extends Model
{
    //
    protected $table = "students_subjects";
    protected $fillable = ['student_code','subject_code','score'];
    public $timestamps = false;
    public function subject(){
        return $this->belongsTo('App\SubjectModel', 'subject_code', 'id');
    }
    public function student(){
        return $this->belongsTo('App\StudentModel', 'student_code', 'id');
    }
}
