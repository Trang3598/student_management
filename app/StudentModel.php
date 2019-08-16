<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = "students";
    public $timestamps = false;
    protected $fillable = ['name','class_code','gender','birthday','phone','address','user_id','image'];
    const PHONES = [
        self::VIETTEL => ['086', '096', '097', '098', '032', '033', '034', '035', '036', '037', '038', '039'],
        self::MOBIPHONE => ['089', '090', '093', '070', '079', '077', '076', '078'],
        self:: VINA =>  ['088', '091', '094', '083', '084', '085', '081', '082']
    ];
    const VIETTEL = 1;
    const MOBIPHONE = 2;
    const VINA = 3;
    public function ClassM(){
        return $this->belongsTo('App\ClassModel', 'class_code', 'id');
    }
    public function studentSubjects(){
        return $this->hasMany(StudentSubjectModel::class,'student_code','id');
    }
    public function subjects()
    {
        return $this->belongsToMany(SubjectModel::class, 'students_subjects', 'student_code', 'subject_code')->withPivot('score');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
