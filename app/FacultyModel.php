<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyModel extends Model
{
    //
    protected $table = "faculties";
    protected $fillable = ['name'];
    public $timestamps = false;

    public function class(){
        return $this->hasMany('App\ClassModel', 'faculty_id', 'id');
    }
    public function student(){
        return $this->hasManyThrough('App\StudentModel', 'App\ClassModel', 'faculty_id', 'class_code', 'id');
    }
}
