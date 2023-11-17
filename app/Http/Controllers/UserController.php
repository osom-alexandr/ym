<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\AttachCompaniesRequest;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Throwable;

use function response;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    public function companies(Request $request): JsonResponse
    {
        try {
            $user = $this->userService->getUser(Auth::id());
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
                'data' => [
                    'user' => new UserResource($user),
                    'companies' => new CompanyCollection($user->companies()->get()),
                ],
            ],
        );
    }

    public function attachCompanies(AttachCompaniesRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->attachCompanies(Auth::id(), $request->get('companies'));
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
                'data' => [
                    'user' => new UserResource($user),
                    'companies' => new CompanyCollection($user->companies()->get()),
                ],
            ],
        );
    }
}
