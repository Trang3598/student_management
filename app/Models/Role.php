<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = ['name','guard_name'];
    public $timestamps = false;
    public function students()
    {
        return $this->belongsTo(Role::class,'id','role_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_has_permission','role_id','permission_id');
    }
}
