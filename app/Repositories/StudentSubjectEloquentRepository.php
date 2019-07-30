<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:34 PM
 */

namespace App\Repositories;


use App\StudentSubjectModel;

class StudentSubjectEloquentRepository  extends EloquentRepository
{
    protected $studentsubjectModel;
    public function __construct(StudentSubjectModel $studentSubjectModel) {
        parent::__construct($studentSubjectModel);
        $this->studentsubjectModel = $studentSubjectModel;
    }
    public function getListById($id)
    {
        return $this->studentsubjectModel->where('student_code','=',$id)->get();
    }

}