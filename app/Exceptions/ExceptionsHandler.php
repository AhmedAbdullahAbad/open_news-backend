<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

trait ExceptionsHandler
{
    /**
     * Creates a new JSON response based on exception type.
     */
    protected function convertExceptionToJsonResponse(Request $request, Throwable $e): JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
    {
        return match (true) {
            $this->isNotFoundHttpException($e) => $this->notFoundHttpEndpoint(),
            $this->isModelNotFoundException($e) => $this->modelNotFound(),
            $this->isValidationException($e) => $this->failedValidation($e),
            $this->isAuthorizationException($e) => $this->forbidden(),
            $this->isUnauthorizedException($e) => $this->unauthorized(),
            $this->isUnauthenticatedException($e) => $this->isUnauthenticated(),
            $this->isLogicalException($e) => $this->logicalException($e, $e->getCode()),
            default => $this->internalServerError()
        };
    }

    /**
     * Determines if the given exception is a http route not found.
     */
    protected function isNotFoundHttpException(Throwable $e): bool
    {
        return $e instanceof NotFoundHttpException;
    }

    /**
     * Determines if the given exception is an Eloquent model not found.
     */
    protected function isModelNotFoundException(Throwable $e): bool
    {
        return $e instanceof ModelNotFoundException;
    }

    /**
     * Determines if the given exception is an authorization or unauthorized exception.
     */
    protected function isAuthorizationException(Throwable $e): bool
    {
        return $e instanceof AuthorizationException;
    }

    /**
     * Determines if the given exception is an unauthorized http or authentication exception.
     */
    protected function isUnauthorizedException(Throwable $e): bool
    {
        return $e instanceof UnauthorizedHttpException;
    }

    /**
     * Determines if the given exception is an unauthenticated exception.
     */
    protected function isUnauthenticatedException(Throwable $e): bool
    {
        return $e instanceof AuthenticationException;
    }

    /**
     * Determines if the given exception is a validation exception.
     */
    protected function isValidationException(Throwable $e): bool
    {
        return $e instanceof ValidationException;
    }

    /**
     * Determines if the given exception is a logical exception.
     */
    protected function isLogicalException(Throwable $e): bool
    {
        return $e instanceof LogicalException;
    }

    /**
     * Returns json response for http route not found exception.
     */
    protected function notFoundHttpEndpoint(int $statusCode = 404): JsonResponse
    {
        return sendFailedResponse(__('exceptions.route_not_found'), null, $statusCode);
    }

    /**
     * Returns json response for Eloquent model not found exception.
     */
    protected function modelNotFound(int $statusCode = 404): JsonResponse
    {
        return sendFailedResponse(__('exceptions.record_not_found'), null, $statusCode);
    }

    /**
     * Returns json response for forbidden exception.
     */
    protected function forbidden(int $statusCode = 403): JsonResponse
    {
        return sendFailedResponse(__('exceptions.forbidden'), null, $statusCode);
    }

    /**
     * Determines if the given exception is an unauthorized http or authentication exception.
     */
    protected function unauthorized(int $statusCode = 401): JsonResponse
    {
        return sendFailedResponse(__('exceptions.forbidden'), null, $statusCode);
    }

    /**
     * Determines if the given exception is an unauthenticated exception.
     */
    protected function isUnauthenticated(int $statusCode = 401): JsonResponse
    {
        return sendFailedResponse(__('exceptions.login_required'), null, $statusCode);
    }

    /**
     * Returns json response for validation errors exception.
     */
    protected function failedValidation(Throwable $e, int $statusCode = 422): JsonResponse
    {
        return sendFailedResponse(__('messages.validation_error'), $e->errors(), $statusCode);
    }

    /**
     * Determines if the given exception is a logic exception.
     */
    protected function logicalException(Throwable $e, int $statusCode = 400): JsonResponse
    {
        return sendFailedResponse(__($e->getMessage()), $e->getError(), $statusCode);
    }

    /**
     * Returns json response for generic bad request.
     */
    protected function internalServerError(int $statusCode = 500): JsonResponse
    {
        return sendFailedResponse(__('exceptions.bad_request'), null, $statusCode);
    }
}
