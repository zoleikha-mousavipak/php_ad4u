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

    public function type($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function createType($request)
    {
        $type = new $this->model;
        $type->title = $request->title;
        if ($request->status) {
            $type->status = $request->status;
        } else {
            $type->status = false;
        }
        $type->save();

        return $type;
    }

    public function updateType($type, $request)
    {
        $type->title = $request->title;
        if ($request->status) {
            $type->status = $request->status;
        } else {
            $type->status = false;
        }
        $type->update();
    }

    public function deleteType($type)
    {
        $type->delete();
    }
}
