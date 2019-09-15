<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    protected $model;

    const ALL = 0;
    const STUDIEDENOUGH = 1;
    const STUDIEDNOTENOUGH = 2;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->paginate(5);
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

    public function store($data)
    {
        return $this->model->create($data);
    }
}