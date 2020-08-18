<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

class InvalidEmailException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Email inválido"],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
