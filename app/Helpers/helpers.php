<?php

declare(strict_types=1);

use App\Exceptions\LogicalException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;

if ( ! function_exists('isAuthenticatedAdmin')) {
    function isAuthenticatedAdmin(): bool
    {
        return Auth::guard('admin-api')->check();
    }
}

if ( ! function_exists('getCurrentAdmin')) {
    function getCurrentAdmin(): Authenticatable
    {
        return Auth::guard('admin-api')->user();
    }
}
