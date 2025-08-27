<?php

declare(strict_types=1);

namespace App\Http\Requests\Admins\News;

use App\Enums\NewsStatus;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

final class StoreNewsRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_ar' => [
                'required',
                'string',
                'max:255',
            ],
            'title_en' => [
                'required',
                'string',
                'max:255',
            ],
            'content_ar' => [
                'required',
                'string',
            ],
            'content_en' => [
                'required',
                'string',
            ],
            'category_id' => [
                'required',
                'integer',
                Rule::exists('categories', 'id'),
            ],
            'status' => [
                'sometimes',
                Rule::in(NewsStatus::cases()),
            ],
            'attachment' => [
                'sometimes',
                'image',
                'max:2048',
            ],

        ];
    }
}
