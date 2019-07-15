<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    //
    protected $table = "students";
    public $timestamps = false;
    public function student(){
        return $this->belongsTo('App\ClassModel', 'class_code', 'id');
    }
}
