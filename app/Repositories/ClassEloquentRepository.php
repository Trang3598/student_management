<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:33 PM
 */

namespace App\Repositories;


use App\ClassModel;
use App\StudentModel;

class ClassEloquentRepository  extends EloquentRepository
{
    protected $studentModel;
    public function __construct(ClassModel $classModel,StudentModel $studentModel) {
        parent::__construct($classModel);
        $this->studentModel = $studentModel;
    }
    public function showStudents($id)
    {
        return $this->studentModel->where('class_code','=',$id)->paginate(5);
    }
}