<?php

declare(strict_types=1);

namespace App\Enums;

enum AdminStatus: string
{
    case ACTIVE = 'active';
    case Not_ACTIVE = 'not_active';
    case SUPER_ADMIN = 'super_admin';
}
