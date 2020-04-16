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

    public function category($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function createCategory($request)
    {
        $category = new $this->model;
        $category->title = $request->title;
        if ($request->status) {
            $category->status = $request->status;
        } else {
            $category->status = false;
        }
        $category->save();

        return $category;
    }

    public function updateCategory($category, $request)
    {
        $category->title = $request->title;
        if ($request->status) {
            $category->status = $request->status;
        } else {
            $category->status = false;
        }
        $category->update();
    }

    public function deleteCategory($category)
    {
        $category->delete();
    }
}
