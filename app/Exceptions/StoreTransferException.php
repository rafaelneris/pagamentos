<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class StoreTransferException
 * @package App\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class StoreTransferException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => $this->getMessage()],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
