<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Presenters\NewsPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snowflake\SnowflakeCast;
use Snowflake\Snowflakes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

final class News extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use NewsPresenter;
    use Snowflakes;

    protected $fillable = [
        'title_en',
        'title_ar',
        'content_en',
        'content_ar',
        'category_id',
        'admin_id',
        'published_at',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachment')->singleFile();
    }

    protected function casts(): array
    {
        return [
            'id' => SnowflakeCast::class,
            'category_id' => SnowflakeCast::class,
            'admin_id' => SnowflakeCast::class,
            'published_at' => 'datetime',
        ];
    }
}
