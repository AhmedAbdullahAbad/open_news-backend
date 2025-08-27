<?php

declare(strict_types=1);

namespace App\Actions\Admins\News;

use App\DTOs\Admins\News\IndexNewsData;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class IndexNewsAction
{
    public function __invoke(IndexNewsData $data): LengthAwarePaginator
    {
        return News::query()
            ->select([
                'id',
                'title_ar',
                'title_en',
                'content_ar',
                'content_en',
                'category_id',
                'admin_id',
                'status',
                'published_at',
                'created_at',
            ])
            ->with(['category', 'admin'])
            ->when(
                $data->search,
                fn (Builder $query, string $search) => $query->where(function (Builder $q) use ($search) {
                    $q->where('title_ar', 'ILIKE', "%{$search}%")
                        ->orWhere('title_en', 'ILIKE', "%{$search}%")
                        ->orWhere('content_ar', 'ILIKE', "%{$search}%")
                        ->orWhere('content_en', 'ILIKE', "%{$search}%");
                })
            )
            ->orderBy($data->order_by, $data->sort)
            ->paginate($data->records_per_page);
    }
}
