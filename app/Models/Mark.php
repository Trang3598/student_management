<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table='students_subjects';
    protected $fillable = ['student_code','subject_code','score'];
    public $timestamps = false;
    public function subjects(){
        return $this->belongsToMany('Subject','students_subjects','student_code','subject_code');
    }
}
