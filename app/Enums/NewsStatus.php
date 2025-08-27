<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @property string $value
 */
enum NewsStatus: string
{
    case PUBLISHED = 'published';
    case NOT_PUBLISHED = 'not_published';
}
