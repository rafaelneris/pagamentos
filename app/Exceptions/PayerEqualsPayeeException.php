<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class PayerEqualsPayeeException
 * @package App\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class PayerEqualsPayeeException extends Exception
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Não é possível transferir dinheiro para você mesmo! Realize um depósito."],
            StatusCodeInterface::STATUS_BAD_REQUEST
        );
    }
}
