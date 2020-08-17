<?php

namespace App\Application\Exceptions;

use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;
use Exception;

/**
 * Class TransactionsEmailNotSendedException
 * @package App\Application\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionsEmailNotSendedException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => 'E-mail não enviado'],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
