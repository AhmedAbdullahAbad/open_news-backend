<?php

declare(strict_types=1);

namespace App\Models\Presenters;

use App\Enums\Locale;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait NewsPresenter
{
    final protected function title(): Attribute
    {
        return Attribute::make(
            get: fn () => app()->getLocale() === Locale::ARABIC->value ? $this->title_ar : $this->title_en
        );
    }

    final protected function content(): Attribute
    {
        return Attribute::make(
            get: fn () => app()->getLocale() === Locale::ARABIC->value ? $this->content_ar : $this->content_en
        );
    }
}
