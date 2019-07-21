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
    public function __construct(StudentSubjectModel $studentSubjectModel) {
        parent::__construct($studentSubjectModel);
    }
}