<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\v1\Admins\Categories;

use App\Actions\Admins\Categories\StoreCategoryAction;
use App\DTOs\Admins\Categories\StoreCategoryData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\Categories\StoreCategoryRequest;
use Illuminate\Http\JsonResponse;

final class StoreCategoryController extends Controller
{
    public function __invoke(StoreCategoryRequest $request): JsonResponse
    {
        $data = StoreCategoryData::from($request->validated());

        app(StoreCategoryAction::class)($data);

        return sendSuccessResponse(
            message: __('messages.create_data'),
        );
    }
}
