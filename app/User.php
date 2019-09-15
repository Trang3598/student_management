<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'username', 'email', 'password','provider','provider_id'
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($pass){
        $this->attributes['password'] = Hash::make($pass);
    }

    public function student(){
        return $this->hasOne(StudentModel::class);
    }
    public function role()
    {
        return $this->hasOne(Role::class,'id','level');
    }
    public function hasDefinePrivilege($level)
    {
        if(!$level)
        {
            return false;
        }
        return $this->level == $level;
    }
}
