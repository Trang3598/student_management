<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    //
    protected $table = "subjects";
    public $timestamps = false;
    protected $fillable = ['name', 'number','slug'];

    public function studentsubject()
    {
        return $this->hasMany('App\StudentSubjectModel');
    }

    public function students()
    {
        return $this->belongsToMany(StudentModel::class, 'students_subjects', 'subject_code', 'student_code');
    }


}
