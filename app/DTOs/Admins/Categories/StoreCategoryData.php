<?php

declare(strict_types=1);

namespace App\DTOs\Admins\Categories;

use Spatie\LaravelData\Data;

final class StoreCategoryData extends Data
{
    public function __construct(
        public string $name_ar,
        public string $name_en,
        public ?bool $is_active,
    ) {}
}
