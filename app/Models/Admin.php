<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Snowflake\SnowflakeCast;
use Snowflake\Snowflakes;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property \Illuminate\Support\Collection|null $permissions
 */
final class Admin extends Authenticatable
{
    use HasApiTokens;

    // use HasRoles;
    use Notifiable;
    use Snowflakes;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'permissions',
        'locale',
    ];

    protected $hidden = [
        'password',
    ];

    protected $attributes = [
        'permissions' => 0,
        'locale' => 'ar',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => SnowflakeCast::class,
            'password' => 'hashed',
        ];
    }
}
