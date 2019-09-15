<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    //
    use Notifiable,HasRoles;
    protected $table = "roles";
    public $timestamps = false;
    protected $fillable = ['name', 'guard_name'];

    public function userRole(){
        return $this->hasOne(User::class,'level','id');
    }
    public function permission()
    {
        return $this->hasManyThrough(Permission::class,'App\RoleHasPermission','id','id','id');
    }
}
