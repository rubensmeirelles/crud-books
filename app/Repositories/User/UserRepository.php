<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface 
{
    public function create(array $data): bool
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);

        return $user->save();
    }

    public function find(int $id) : object
    {
        return User::find($id);
    }

}