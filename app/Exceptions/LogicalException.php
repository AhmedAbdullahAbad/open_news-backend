<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

final class LogicalException extends Exception
{
    private array|string|null $error;

    public function __construct(string $message = 'error', int $statusCode = 400, array|string|null $error = null, ?Throwable $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
        $this->error = $error;
    }

    public function getError(): array|string|null
    {
        return $this->error;
    }
}
