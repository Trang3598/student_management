<?php

namespace App\Repositories\Student;

use App\Models\ClassModel;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    protected $class;
    protected $mark;
    protected $subject;

    public function __construct(Student $student, ClassModel $class, Mark $mark, Subject $subject)
    {
        parent::__construct($student);
        $this->class = $class;
        $this->mark = $mark;
        $this->subject = $subject;
    }

    public function getList()
    {
        return $this->model->all();
    }

    /*    public function showSubjects($classId)
        {
            $class = $this->class->where('id', $classId)->first();
            $subject = $this->subject->where('faculty_id', $class->faculty_id)
                ->orWhereHas('faculty', function ($query) {
                    $query->where('name', 'Khoa cơ bản');
                });
            return $subject->get()->pluck('name', 'id');
        }*/

    public function checkAvatar($image)
    {
        return $this->model->where('image', $image);
    }

    public function searchStudent($data)
    {
        $students = $this->model->newQuery();
        if (isset($data['min_age'])) {
            $minAge = Carbon::now()->subYears($data['min_age']);
            $students->where('birthday', '<', $minAge);
        }

        if (isset($data['max_age'])) {
            $maxAge = Carbon::now()->subYears($data['max_age']);
            $students->where('birthday', '>', $maxAge);
        }

        if (isset($data['min_mark'])) {
            $students->whereHas('marks', function ($query) use ($data) {
                $query->where('score', '>', $data['min_mark']);
            });
        }

        if (isset($data['max_mark'])) {
            $students->whereHas('marks', function ($query) use ($data) {
                $query->where('score', '<', $data['max_mark']);
            });
        }

/*        if (isset($data['phones'][0])) {
            $phone = substr($data['phones'][0], 0, -6);
            $students->where(function ($query) use ($data) {
                $query->where('phone', 'Like', $phone;
            });
        }*/
return $students->get();
}

public
function getStudents($id)
{
    return $this->model->where('class_code', $id)->get();
}
}
