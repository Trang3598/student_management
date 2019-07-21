<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:27 PM
 */

namespace App\Repositories;


use App\SubjectModel;

class SubjectEloquentRepository  extends EloquentRepository
{
    public function __construct(SubjectModel $subjectModel) {
        parent::__construct($subjectModel);
    }
}