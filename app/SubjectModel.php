<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    //
    protected $table = "subjects";
    public $timestamps = false;
    protected $fillable = ['name','number'];
    public function studentsubject2(){
        return $this->hasMany('App\StudentSubjectModel');
    }
}
