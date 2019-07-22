<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $table = "faculties";
    protected $fillable = ['name'];

    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }
}
