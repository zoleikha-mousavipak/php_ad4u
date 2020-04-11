<?php

namespace App\Services;

use App\Models\Type;

class TypeService extends BaseService
{

    public function __construct(Type $type)
    {
        $this->model = $type;
    }

    public function typesList()
    {
        return $this->model->whereStatus(true)->orderby('title', 'asc')->get();
    }
}
