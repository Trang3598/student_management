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

    public function getClasses()
    {
        return $this->class->all()->pluck('name', 'id');
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

/*    public function searchStudent($data)
    {
        if (isset($data['min_age']) && isset($data['max_age'])) {
            $min = Carbon::now()->subYears($data['min_age']);
            $max = Carbon::now()->subYears($data['max_age']);
            $students = $this->model->whereBetween('birthday', [$max, $min]);
            if (!empty($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        } else {
            $students = $this->model->query();
            if (!empty($data['phones'])) {
                $students->where(function ($query) use ($data) {
                    foreach ($data['phones'] as $key => $phone) {
                        $query->orWhere('phone_number', 'regexp', $phone);
                    }
                });
            }
        }
        if (isset($data['min_mark']) && isset($data['max_mark']) && isset($data['subject_id'])) {
            $students->whereHas('mark', function ($query) use ($data) {
                $query->where('subject_id', $data['subject_id'])
                    ->whereBetween('mark', [$data['min_mark'], $data['max_mark']]);
            });
        }
        return $students->paginate(5);
    }*/

    public function getStudents($id)
    {
        return $this->model->where('class_code', $id)->get();
    }
}
