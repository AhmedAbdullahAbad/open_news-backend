<?php

declare(strict_types=1);

namespace App\DTOs\Admins\Categories;

use Spatie\LaravelData\Data;

final class IndexCategoryData extends Data
{
    public function __construct(
        public ?string $search,
        public ?string $order_by = 'created_at',
        public ?string $sort = 'desc',
        public ?int $page = 1,
        public ?int $records_per_page = 10,
    ) {}
}
