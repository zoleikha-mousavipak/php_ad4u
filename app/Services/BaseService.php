<?php

namespace App\Services;

class BaseService
{
    protected $model;

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
