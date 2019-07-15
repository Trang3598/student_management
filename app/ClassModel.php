<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    //
    protected $table = "classes";
    public $timestamps = false;
    public function faculty(){
        return $this->belongsTo('App\FacultyModel', 'faculty_id', 'id');
    }
}
