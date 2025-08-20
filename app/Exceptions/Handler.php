<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class Handler extends ExceptionHandler
{
    use ExceptionsHandler;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        LogicalException::class,
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void {}

    public function render($request, Throwable $e): \Illuminate\Http\Response|JsonResponse|Response
    {
        if ($this->isApiRequest($request, $e)) {
            return match (config('app.debug')) {
                false => $this->convertExceptionToJsonResponse($request, $e),
                default => parent::render($request, $e)
            };
        }

        // we don't need this if
        if ($this->isFilamentRequest($request, $e)) {
            return parent::render($request, $e);
        }

        return parent::render($request, $e);
    }

    protected function isApiRequest(Request $request, Throwable $e): bool
    {
        return Str::startsWith($request->path(), 'api') || $request->expectsJson();
    }

    protected function isFilamentRequest(Request $request, Throwable $e): bool
    {
        return Str::contains($request->path(), config('filament.path', 'admin'));
    }
}
