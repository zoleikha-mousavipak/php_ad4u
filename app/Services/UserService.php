<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function updateProfile($user, $request)
    {
        $user->name = $request->name;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
    }

    public function createUser($request)
    {
        $user = new $this->model;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function user($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function updateUser($user, $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->admin) {
            $user->admin = $request->admin;
        } else {
            $user->admin = false;
        }
        $user->update();
    }

    public function deleteUser($user)
    {
        $user->delete();
    }
}
