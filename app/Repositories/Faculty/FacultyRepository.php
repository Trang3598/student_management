<?php

namespace App\Repositories\Faculty;

use App\Models\ClassModel;
use App\Models\Faculty;
use App\Repositories\Base\BaseRepository;

class FacultyRepository extends BaseRepository
{
    protected $classModel;

    public function __construct(Faculty $faculty, ClassModel $classModel)
    {
        parent::__construct($faculty);
        $this->classModel = $classModel;
    }

    public function getFaculties()
    {
        return $this->model::all()->pluck('name', 'id');
    }
}
