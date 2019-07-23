<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table='students_subjects';
    protected $fillable = ['student_code','subject_code','score'];
    public $timestamps = false;
    public function subjects(){
        return $this->belongsTo('App\Models\Subject','subject_code','id');
    }
    public function students(){
        return $this->belongsTo('App\Models\Student','student_code','id');
    }
}
