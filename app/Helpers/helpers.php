<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

if (! function_exists('isAuthenticatedAdmin')) {
    function isAuthenticatedAdmin(): bool
    {
        return Auth::guard('admin-api')->check();
    }
}

if (! function_exists('getCurrentAdmin')) {
    function getCurrentAdmin(): Authenticatable
    {
        return Auth::guard('admin-api')->user();
    }
}
