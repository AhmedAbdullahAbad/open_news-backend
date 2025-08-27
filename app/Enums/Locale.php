<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @property string $value
 */
enum Locale: string
{
    case ARABIC = 'ar';
    case ENGLISH = 'en';
}
