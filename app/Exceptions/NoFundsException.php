<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class StoreTransferException
 * @package App\Exceptions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class NoFundsException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => 'No funds to transfer'],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
