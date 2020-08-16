<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionNotAuthorizedException
 * @package App\Application\Exceptions
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
            ['error' => 'Sua transação não foi autorizada!'],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
