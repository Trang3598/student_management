<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyModel extends Model
{
    //
    protected $table = "faculties";
    protected $fillable = ['name'];
    public $timestamps = false;
}
