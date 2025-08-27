<?php

declare(strict_types=1);

namespace App\Http\Requests\Admins\Categories;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

final class IndexCategoryRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => [
                'sometimes',
                'string',
            ],
            'sort' => [
                'sometimes',
                Rule::in(['asc', 'desc']),
            ],
            'page' => [
                'integer',
                'min:1',
            ],
            'records_per_page' => [
                'integer',
                'min:1',
            ],
        ];
    }
}
