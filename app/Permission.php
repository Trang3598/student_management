<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = "permissions";
    public $timestamps = false;
    protected $fillable = ['name', 'guard_name'];



}
