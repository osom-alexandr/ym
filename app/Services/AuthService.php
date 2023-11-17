<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\NewAccessToken;

class AuthService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {
    }

    /**
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function loginByEmailAndPassword(string $email, string $password): NewAccessToken
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return $this->userRepository->findOneByEmail($email)?->createToken('authToken');
        }

        throw new AuthenticationException('Invalid Credentials');
    }

    public function registerUser(array $data): User
    {
        return $this->userRepository->register($data);
    }
}
