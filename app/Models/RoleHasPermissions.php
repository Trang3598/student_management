<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{
    protected $table='role_has_permissions';
    protected $fillable = ['role_id','permission_id'];
    public function roles(){
        return $this->belongsTo('App\Models\Role','role_id','id');
    }
    public function permissions(){
        return $this->belongsTo('App\Models\Permission','permission_id','id');
    }
}
