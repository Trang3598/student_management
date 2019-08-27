<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:34 PM
 */

namespace App\Repositories;


use App\StudentSubjectModel;
use Illuminate\Support\Facades\DB;

class StudentSubjectEloquentRepository extends EloquentRepository
{
    protected $studentsubjectModel;

    public function __construct(StudentSubjectModel $studentSubjectModel)
    {
        parent::__construct($studentSubjectModel);
        $this->studentsubjectModel = $studentSubjectModel;
    }

    public function getListById($id)
    {
        return $this->studentsubjectModel->where('student_code', '=', $id)->paginate(5);
    }

    public function getListUnregisteredSubject($id)
    {
        //
        $students = $this->model->newQuery();
        $marks = $students->whereHas('student', function ($query) use ($id) {
            $query->where('student_code', '=', $id);
        })->get();
        $data = [];
        foreach ($marks as $key => $value) {
          array_push($data,[
               $marks[$key]->subject_code
          ]);
        }
        $subjects = DB::table('subjects')
            ->whereNotIn('id', $data);
        return $subjects->get();
    }
}