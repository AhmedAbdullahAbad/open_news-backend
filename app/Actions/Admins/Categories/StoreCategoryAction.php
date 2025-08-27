<?php

declare(strict_types=1);

namespace App\Actions\Admins\Categories;

use App\DTOs\Admins\Categories\StoreCategoryData;
use App\Models\Category;

final class StoreCategoryAction
{
    public function __invoke(StoreCategoryData $data): void
    {
        Category::query()->create(
            array_filter($data->toArray(), fn ($value) => ! is_null($value))
        );
    }
}
