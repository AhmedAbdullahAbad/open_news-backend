<?php

declare(strict_types=1);

namespace App\Enums;

enum UserStatus: string
{
    case ACTIVE = 'active';
    case EMAIL_NOT_VERIFIED = 'email_not_verified';
    case ACCOUNT_DELETED = 'account_deleted';
}
