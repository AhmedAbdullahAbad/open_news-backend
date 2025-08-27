<?php

declare(strict_types=1);

namespace App\Http\Requests\Admins\Auth;

use App\Http\Requests\BaseFormRequest;

final class LoginRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:strict',
            ],
            'password' => [
                'required',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            [
                'email' => mb_strtolower($this->email ?? ''),
            ]
        );
    }
}
