<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:25 PM
 */

namespace App\Repositories;


use App\StudentModel;

class StudentEloquentRepository  extends EloquentRepository
{
    public function __construct(StudentModel $studentModel) {
        parent::__construct($studentModel);
    }
}