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
    public function studentsubject1(){
        return $this->hasMany('App\StudentSubjectModel');
    }
}
