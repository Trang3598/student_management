<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    const VINA = 0;
    const MOBI = 1;
    const VIETTEL = 2;
    const PHONES = [
        self::VINA => ['091', '0123'],
        self::MOBI => ['090', '0124'],
        self::VIETTEL => ['097', '098'],

    ];

    protected $fillable = ['name','class_code','gender','birthday','image','phone','address'];

    public function subjects(){
        return $this->belongsToMany(Subject::class,'students_subjects','student_code','subject_code')->withPivot('score');
    }

    public function students(){
        return $this->belongsTo(ClassModel::class,'class_code','id');
    }
    public function marks()
    {
        return $this->hasMany(Mark::class,'student_code','id');
    }
}
