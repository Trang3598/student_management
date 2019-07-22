<?php
namespace App\Repositories\Faculty;

use App\Repositories\EloquentRepository;

class FacultyRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Faculty::class;
    }
}
