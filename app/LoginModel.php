<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    //
    protected $table = 'users';
    protected  $fillable = ['email','password'];
    public $timestamps = false;
}
