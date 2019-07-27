<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['name','class_code','gender','birthday','image','phone','address'];

    public function subjects(){
        return $this->belongsToMany(SubjectModel::class,'students_subjects');
    }

    public function students(){
        return $this->belongsTo(ClassModel::class,'class_code','id');
    }
    public function marks()
    {
        return $this->hasMany(Mark::class,'student_code','id');
    }
}
