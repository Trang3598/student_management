<?php

namespace App\Repositories\Student;

use App\Models\ClassModel;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    const ENOUGHMARKCOUNT = 1;
    const NOTENOUGHMARKCOUNT = 2;
    protected $class;
    protected $mark;
    protected $subject;
    protected $user;

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
        if (isset($data['mark_count'])) {
            $subjects = DB::table('subjects')->count();
            if ($data['mark_count'] == self::ENOUGHMARKCOUNT) {
                $students->has('subjects', '=', $subjects);
            }
            if ($data['mark_count'] ==  self::NOTENOUGHMARKCOUNT) {
                $students->has('subjects', '<>', $subjects);
            }
        }

        if (isset($data['phones'])) {
            $students->where(function ($query) use ($data) {
                foreach ($data['phones'] as $phone) {
                    foreach (Student::PHONES[$phone] as $sur_phone) {
                        $query->orWhere('phone', 'Like', sprintf('%s%s', $sur_phone, '%'));
                    }
                }
            });
        }
        return $students->get();
    }

    public function getStudents($id)
    {
        return $this->model->where('class_code', $id)->get();
    }

    public function failStudents()
    {
        $subjects = DB::table('subjects')->count();
        $students = $this->model->has('subjects', '=', $subjects)->get();
        $warning = [];
        foreach ($students as $key => $student) {
            $avg = $student->marks->Avg('score');
            if ($avg < 5) {
                $warning[] = $student;
            }
        }
        return $warning;
    }
}
