<?php

declare(strict_types=1);

namespace App\Models\Presenters;

use App\Enums\Locale;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CategoryPresenter
{
    final protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => app()->getLocale() === Locale::ARABIC->value ? $this->name_ar : $this->name_en
        );
    }
}
