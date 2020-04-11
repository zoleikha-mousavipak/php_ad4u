<?php

namespace App\Services;

use App\Models\Category;

class CategoryService extends BaseService
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function categoriesList()
    {
        return $this->model->whereStatus(true)->orderBy('title', 'asc')->get();
    }
}
