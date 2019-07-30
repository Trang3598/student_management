<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/18/2019
 * Time: 9:14 AM
 */

namespace App\Repositories;


use App\ClassModel;
use App\FacultyModel;

class FacultyEloquentRepository extends EloquentRepository
{
    protected $classModel;
    public function __construct(FacultyModel $facultyModel,ClassModel $classModel) {
        parent::__construct($facultyModel);
        $this->classModel = $classModel;
    }
    public function getModel()
    {
        return App\FacultyModel::class;

    }
    public function showClasses($id) {
        return $this->classModel->where('faculty_id','=', $id)->get();
    }

}