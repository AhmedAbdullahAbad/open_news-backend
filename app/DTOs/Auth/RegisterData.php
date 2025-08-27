<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Auth;

use App\Enums\UserStatus;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class RegisterData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        public string $first_name,
        public string $last_name,
        public Optional|UploadedFile $avatar,
        public string $status = UserStatus::EMAIL_NOT_VERIFIED->value,
    ) {}
}
