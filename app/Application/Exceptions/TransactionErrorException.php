<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionErrorException
 * @package App\Application\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionErrorException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Erro durante a realização da transferência. Por favor, Tente novamente."],
            StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR
        );
    }
}
