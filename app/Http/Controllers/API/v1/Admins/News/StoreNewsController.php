<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\v1\Admins\News;

use App\Actions\Admins\News\StoreNewsAction;
use App\DTOs\Admins\News\StoreNewsData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\News\StoreNewsRequest;
use Illuminate\Http\JsonResponse;

final class StoreNewsController extends Controller
{
    public function __invoke(StoreNewsRequest $request): JsonResponse
    {
        $data = StoreNewsData::from($request->validated());

        app(StoreNewsAction::class)($data);

        return sendSuccessResponse(
            message: __('messages.create_data'),
        );
    }
}
