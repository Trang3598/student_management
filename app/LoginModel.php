<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class LoginModel extends Model
{
    //
    use HasRoles;
    protected $table = 'users';
    protected  $fillable = ['email','password'];
    public $timestamps = false;
}
