<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permissions";
    protected $fillable = ['name','guard_name'];
    public function roles(){
        return $this->belongstoMany(Role::class,'role_has_permission','permission_id','role_id');
    }
}
