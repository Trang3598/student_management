<?php

namespace App\Repositories\ClassRepository;

use App\Models\ClassModel;
use App\Repositories\Base\BaseRepository;

class ClassRepository extends BaseRepository
{
    protected $student;

    public function __construct(ClassModel $classModel)
    {
        parent::__construct($classModel);
    }

    public function getClasses()
    {
        return $this->model::all()->pluck('name', 'id');
    }
}
