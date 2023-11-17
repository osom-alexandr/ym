<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findOneByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function findOneByUserId(string $userId): ?User
    {
        return User::where('id', $userId)->first();
    }

    public function register(array $data): User
    {
        $user = new User();
        $user->fill($data);
        $user->save();

        return $user;
    }
}
