<?php


namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

class TransactionErrorException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return response()->json(
            ['error' => "Erro durante a realização da transferência. Por favor, Tente novamente."],
            StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR
        );
    }
}
