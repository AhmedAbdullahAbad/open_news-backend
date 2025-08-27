<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Presenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Snowflake\SnowflakeCast;
use Snowflake\Snowflakes;

final class Category extends Model
{
    use CategoryPresenter;
    use HasFactory;
    use Snowflakes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $attributes = [
        'is_active' => true,
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    protected function casts(): array
    {
        return [
            'id' => SnowflakeCast::class,
        ];
    }
}
