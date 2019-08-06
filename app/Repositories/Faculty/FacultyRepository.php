<?php

namespace App\Repositories\Faculty;

use App\Models\Faculty;
use App\Repositories\Base\BaseRepository;

class FacultyRepository extends BaseRepository
{

    public function __construct(Faculty $faculty)
    {
        parent::__construct($faculty);
    }

    public function getFaculties()
    {
        return $this->model::all()->pluck('name', 'id');
    }
}
