<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name','class_code','gender','birthday','image','address'];

    public function subjects(){
        return $this->hasManyThrough(SubjectModel::class);
    }

    public function students(){
        return $this->belongsTo(Faculty::class);
    }
}
