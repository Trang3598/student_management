<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Student extends Model
{
    protected $table = 'students';

    const VINA = 0;
    const MOBI = 1;
    const VIETTEL = 2;
    const PHONES = [
        self::VINA => ['091', '0123'],
        self::MOBI => ['090', '0124'],
        self::VIETTEL => ['097', '098','035','086','096','032','033','034','037','036','038','039'],
    ];

    protected $fillable = ['name','class_code','gender','birthday','image','phone','address','user_id','trans_id','slug'];

    public function subjects(){
        return $this->belongsToMany(Subject::class,'students_subjects','student_code','subject_code')->withPivot('score');
    }

    public function students(){
        return $this->belongsTo(ClassModel::class,'class_code','id');
    }
    public function marks()
    {
        return $this->hasMany(Mark::class,'student_code','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function classes()
    {
        return $this->belongsTo(ClassModel::class,'id','class_code');
    }
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return $this->getSlugKeyName();
    }
    use HasRoles;
    use HasPermissions;
}
