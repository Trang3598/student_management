<?php

namespace App\Repositories;

use App\FacultyModel;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function update($id, array $attributes)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
}