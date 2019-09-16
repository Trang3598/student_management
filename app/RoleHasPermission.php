<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    //
    protected $table = "role_has_permissions";
    public $timestamps = false;
    protected $fillable = ['role_id','permission_id'];
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
