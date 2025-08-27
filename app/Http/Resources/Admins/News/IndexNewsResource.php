<?php

declare(strict_types=1);

namespace App\Http\Resources\Admins\News;

use App\Http\Resources\Admins\AdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class IndexNewsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                ];
            }),
            'admin' => AdminResource::make($this->whenLoaded('admin')),
            'status' => $this->status,
            'published_at' => $this->published_at?->format('d/m/Y'),
            'created_at' => $this->created_at->format('d/m/Y'),
        ];
    }
}
