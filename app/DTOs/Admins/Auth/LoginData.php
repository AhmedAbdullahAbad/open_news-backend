<?php

declare(strict_types=1);

namespace App\DTOs\Admins\Auth;

use Spatie\LaravelData\Data;

final class LoginData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
