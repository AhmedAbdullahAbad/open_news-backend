<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\v1\Admins\Auth;

use App\Actions\Admins\Auth\LoginAction;
use App\DTOs\Admins\Auth\LoginData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\Auth\LoginRequest;
use App\Http\Resources\Admins\Auth\LoginResource;
use Illuminate\Http\JsonResponse;

final class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $data = LoginData::from($request->validated());

        $admin = app(LoginAction::class)($data);

        return sendSuccessResponse(
            message: __('auth.success_login'),
            data: LoginResource::make($admin)
        );
    }
}
