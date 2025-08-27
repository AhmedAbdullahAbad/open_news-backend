<?php

declare(strict_types=1);

namespace App\Actions\Admins\Auth;

use App\DTOs\Admins\Auth\LoginData;
use App\Enums\AdminStatus;
use App\Exceptions\LogicalException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

final class LoginAction
{
    public function __invoke(LoginData $data): Admin
    {
        Auth::shouldUse('admin-login');

        if (! Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            throw new LogicalException(
                __('auth.failed'),
                403
            );
        }

        /** @var Admin $admin */
        $admin = Auth::user();

        if ($admin->status === AdminStatus::Not_ACTIVE->value) {
            throw new LogicalException(__('auth.account_not_active'));
        }

        $admin->token = $admin->createToken('admin')->plainTextToken;

        return $admin;
    }
}
