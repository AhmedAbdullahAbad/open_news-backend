<?php

declare(strict_types=1);

namespace App\DTOs\Admins\News;

use App\Enums\NewsStatus;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

final class StoreNewsData extends Data
{
    public function __construct(
        public string $title_en,
        public string $title_ar,
        public string $content_en,
        public string $content_ar,
        public int $category_id,
        public UploadedFile $attachment,
        public string $status = NewsStatus::PUBLISHED->value,
    ) {}
}
