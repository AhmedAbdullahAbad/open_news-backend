<?php

declare(strict_types=1);

namespace App\Http\Resources\Admins\Categories;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class StoreCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('d/m/Y'),
        ];
    }
}
