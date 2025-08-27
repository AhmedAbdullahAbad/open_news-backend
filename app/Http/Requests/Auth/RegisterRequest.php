<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rules\Password;

final class RegisterRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:strict',
                'unique:users,email',
            ],
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
                'confirmed',
            ],
            'avatar' => [
                'sometimes',
                'image',
                'max:2048',
            ],
            'first_name' => [
                'required',
                'string',
                'regex:/^[\p{Arabic}A-Za-z ]+$/u',
                'min:2',
                'max:50',
            ],
            'last_name' => [
                'required',
                'string',
                'regex:/^[\p{Arabic}A-Za-z ]+$/u',
                'min:2',
                'max:50',
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
