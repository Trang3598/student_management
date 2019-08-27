<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:25 PM
 */

namespace App\Repositories;


use App\ClassModel;
use App\StudentModel;
use App\StudentSubjectModel;
use App\SubjectModel;
use Carbon\Carbon;
use function foo\func;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StudentEloquentRepository extends EloquentRepository
{
    protected $studentsubject;
    protected $class;

    const VIETTEL = 1;

    public function __construct(StudentModel $studentModel, StudentSubjectModel $studentsubject, ClassModel $classModel)
    {
        parent::__construct($studentModel);
        $this->studentsubject = $studentsubject;
        $this->class = $classModel;
    }

    public function showResults($id)
    {
        return $this->studentsubject->where('student_code', '=', $id)->get();
    }

    public function getListById($id)
    {
        return $this->model->find($id);
    }

    public function getListStudents($id)
    {
        return $this->model->where('class_code', '=', $id)->get();
    }

    public function searchStudent($data)
    {
        $students = $this->model->with(['user','ClassM']);
        if (isset($data['min_age'])) {
            $minAge = Carbon::now()->subYears($data['min_age']);
            $students->where('birthday', '<', $minAge);
        }
        if (isset($data['max_age'])) {
            $maxAge = Carbon::now()->subYears($data['max_age']);
            $students->where('birthday', '>', $maxAge);
        }
        if (isset($data['min_score'])) {
            $students->whereHas('studentSubjects', function ($query) use ($data) {
                $query->where('score', '>', $data['min_score']);
            });
        }
        if (isset($data['max_score'])) {
            $students->whereHas('studentSubjects', function ($query) use ($data) {
                $query->where('score', '<', $data['max_score']);
            });
        }
        if (isset($data['phone'])) {
            $students->where(function ($query) use ($data) {
                foreach ($data['phone'] as $phone) {
                    foreach (StudentModel::PHONES[$phone] as $sur_phone) {
                        $query->orWhere('phone', 'Like', $sur_phone . '%');
                    }
                }
            });
        }
        if (isset($data['showList'])) {
            $subjects = DB::table('subjects')->count();
            if ($data['showList'] == self::STUDIEDENOUGH) {
                $students->has('subjects', '=', $subjects);
            } elseif ($data['showList'] == self::STUDIEDNOTENOUGH) {
                $students->has('subjects', '<>', $subjects);
            } elseif ($data['showList'] == self::ALL) {
                $students->select();
            }
        }
        return  $students;
}

    public function findScoreOfStudent()
    {
        $subjects = SubjectModel::all()->count();
        $students = $this->model->has('subjects', '=', $subjects)->whereHas(
            'studentSubjects', function ($query) {
            $query->havingRaw('AVG(score) < 5');
        }
        );
        return $students->paginate(5);
    }

    public function findStudentThroughUser($id)
    {
        $students = $this->model->newQuery();
        $students->whereHas('user', function ($query) use ($id) {
            $query->where('user_id', $id);
        });
        return $students->paginate(5);
    }
}