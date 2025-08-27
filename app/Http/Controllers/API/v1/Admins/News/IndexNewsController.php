<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\v1\Admins\News;

use App\Actions\Admins\News\IndexNewsAction;
use App\DTOs\Admins\News\IndexNewsData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\News\IndexNewsRequest;
use App\Http\Resources\Admins\News\IndexNewsResource;
use Illuminate\Http\JsonResponse;

final class IndexNewsController extends Controller
{
    public function __invoke(IndexNewsRequest $request): JsonResponse
    {
        $data = IndexNewsData::from($request->validated());

        $news = app(IndexNewsAction::class)($data);

        return sendSuccessResponse(
            message: __('messages.get_data'),
            data: IndexNewsResource::collection($news)->appends(request()->query()),
        );
    }
}
