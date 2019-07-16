<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    //
    protected $fillable = ['name','faculty_id'];

    public function classes(){
        return $this->hasMany(Faculty::class,'faculty_id','id');
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
}
