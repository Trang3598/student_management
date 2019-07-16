<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name','class_code','gender','birthday','image','address'];

    public function subjects(){
        return $this->belongsToMany(SubjectModel::class,'students_subjects');
    }

    public function students(){
        return $this->hasMany(Faculty::class,'class_code','id');
    }
}
