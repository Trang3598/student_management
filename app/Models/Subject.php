<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    //
    protected $fillable = ['name','number'];
    public function student(){
        return $this->hasManyThrough(Student::class);
    }
}
