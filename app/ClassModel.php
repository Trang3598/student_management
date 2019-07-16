<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    //
    protected $table = "classes";
    protected $fillable = ['faculty_id','name'];
    public $timestamps = false;
    public function faculty(){
        return $this->belongsTo('App\FacultyModel', 'faculty_id', 'id');
    }
}
