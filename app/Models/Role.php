<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = ['name','guard_name'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class,'id','role_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_has_permission','role_id','permission_id');
    }
}
