<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Throwable;

use function response;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService,
    ) {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $token = $this->authService->loginByEmailAndPassword(
                $request->get('email'),
                $request->get('password')
            );
        } catch (Throwable $exception) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $exception->getMessage(),
                ],
                500
            );
        }

        return response()->json(
            [
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $token->plainTextToken,
            ],
        );
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $user = $this->authService->registerUser($request->all());
        } catch (Throwable $exception) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $exception->getMessage(),
                ],
                500
            );
        }

        return response()->json(
            [
                'status' => true,
                'message' => 'User Registered Successfully',
                'user' => new UserResource($user),
            ],
        );
    }
}
