<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/19/2019
 * Time: 2:33 PM
 */

namespace App\Repositories;


use App\ClassModel;

class ClassEloquentRepository  extends EloquentRepository
{
    public function __construct(ClassModel $classModel) {
        parent::__construct($classModel);
    }
}