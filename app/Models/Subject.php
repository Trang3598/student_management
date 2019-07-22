<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";

    protected $fillable = ['name','number'];

    public function subjects()
    {
        return $this->belongstoMany(Student::class);
    }
    public function getListClass() {
        return $this->with('classes')->get();
    }
}

