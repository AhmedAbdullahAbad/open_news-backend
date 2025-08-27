<?php

declare(strict_types=1);

namespace App\Actions\Admins\Categories;

use App\DTOs\Admins\Categories\IndexCategoryData;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class IndexCategoryAction
{
    public function __invoke(IndexCategoryData $data): LengthAwarePaginator
    {
        return Category::query()
            ->select([
                'id',
                'name_ar',
                'name_en',
                'is_active',
                'created_at',
            ])
            ->when(
                $data->search,
                fn (Builder $query, string $search) => $query->where(function (Builder $q) use ($search) {
                    $q->where('name_ar', 'ILIKE', "%{$search}%")
                        ->orWhere('name_en', 'ILIKE', "%{$search}%");
                })
            )
            ->orderBy($data->order_by, $data->sort)
            ->paginate($data->records_per_page);
    }
}
