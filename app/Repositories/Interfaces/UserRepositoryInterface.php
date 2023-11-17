<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findOneByEmail(string $email): ?User;
    public function findOneByUserId(string $userId): ?User;
    public function register(array $data): User;
}
