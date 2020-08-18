<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionNotAuthorizedException
 * @package App\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionNotAuthorizedException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => 'Transaction not authorized'],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
