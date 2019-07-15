<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    //
    protected $fillable = ['name','faculty_id'];

    public function faculties(){
        return $this->hasManyThrough(Student::class);
    }

}
