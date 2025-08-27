<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\v1\Admins\Categories;

use App\Actions\Admins\Categories\IndexCategoryAction;
use App\DTOs\Admins\Categories\IndexCategoryData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\Categories\IndexCategoryRequest;
use App\Http\Resources\Admins\Categories\IndexCategoryResource;
use Illuminate\Http\JsonResponse;

final class IndexCategoryController extends Controller
{
    public function __invoke(IndexCategoryRequest $request): JsonResponse
    {
        $data = IndexCategoryData::from($request->validated());

        $categories = app(IndexCategoryAction::class)($data);

        return sendSuccessResponse(
            message: __('messages.get_data'),
            data: IndexCategoryResource::collection($categories)->appends(request()->query()),
        );
    }
}
