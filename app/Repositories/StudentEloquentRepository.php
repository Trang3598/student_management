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
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StudentEloquentRepository extends EloquentRepository
{
    protected $studentsubject;
    protected $class;

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
        $students = $this->model->newQuery();
        if (!empty($data['min_age'])) {
            $minAge = Carbon::now()->subYears($data['min_age']);
            $students->where('birthday', '<', $minAge);
        }
        if (!empty($data['max_age'])) {
            $maxAge = Carbon::now()->subYears($data['max_age']);
            $students->where('birthday', '>', $maxAge);
        }
        if (!empty($data['min_score'])) {
            $students->whereHas('studentSubjects', function ($query) use ($data) {
                $query->where('score', '>', $data['min_score']);
            });
        }
        if (!empty($data['max_score'])) {
            $students->whereHas('studentSubjects', function ($query) use ($data) {
                $query->where('score', '<', $data['max_score']);
            });
        }
        $viettels = ['086', '096', '097', '098', '032', '033', '034', '035', '036', '037', '038', '039'];
        $mobiphones = ['089', '090', '093', '070', '079', '077', '076', '078'];
        $vinaphones = ['088', '091', '094', '083', '084', '085', '081', '082'];
        if (!empty($data['phone'])) {
            $phone = $data['phone'];
            foreach ($phone as $key => $value) {
                if ($value == 1) {
                    foreach ($viettels as $viettel) {
                        $students->orWhere('phone', 'like', '%' . $viettel . '%');
                    }
                }
                if ($value == 2) {
                    foreach ($mobiphones as $j => $mobiphone) {
                        $students->orWhere('phone', 'like', '%' . $mobiphone . '%');
                    }
                }
                if ($value == 3) {
                    foreach ($vinaphones as $k => $vinaphone) {
                        $students->orWhere('phone', 'like', '%' . $vinaphone . '%');

                    }
                }
            }
        }
        return $students->get();
    }
}