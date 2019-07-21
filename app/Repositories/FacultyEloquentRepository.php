<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/18/2019
 * Time: 9:14 AM
 */

namespace App\Repositories;


use App\FacultyModel;

class FacultyEloquentRepository extends EloquentRepository
{
    public function __construct(FacultyModel $facultyModel) {
        parent::__construct($facultyModel);
    }
    public function getModel()
    {
        return App\FacultyModel::class;

    }


}