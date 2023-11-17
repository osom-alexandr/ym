<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    public function getUser(string $userId): User
    {
        return $this->userRepository->findOneByUserId($userId);
    }

    public function attachCompanies(string $userId, array $companiesIds): User
    {
        $user = $this->getUser($userId);
        $user->companies()->sync($companiesIds, false);

        return $user;
    }
}
