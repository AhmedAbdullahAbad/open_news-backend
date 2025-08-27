<?php

declare(strict_types=1);

namespace App\Actions\Admins\News;

use App\DTOs\Admins\News\StoreNewsData;
use App\Models\Admin;
use App\Models\News;
use Spatie\LaravelData\Optional;

final class StoreNewsAction
{
    public function __invoke(StoreNewsData $data): void
    {
        /** @var Admin $admin */
        $admin = getCurrentAdmin();

        /** @var News $news */
        $news = $admin->news()->create($data->toArray());

        if (! $data->attachment instanceof Optional) {
            $news->addMedia($data->attachment)->toMediaCollection('attachment');
        }
    }
}
