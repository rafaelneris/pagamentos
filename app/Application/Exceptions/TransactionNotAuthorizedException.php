<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class TransactionNotAuthorizedException
 * @package App\Application\Exceptions
 */
class TransactionNotAuthorizedException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return response()->json(
            ['error' => 'Sua transação não foi autorizada!'],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
