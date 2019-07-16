<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    public function subjects(){
        return $this->belongsToMany('Subject','students_subjects','student_code','subject_code');
    }
}
